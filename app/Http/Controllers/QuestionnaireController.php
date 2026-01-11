<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Models\QuestionnaireSection;
use App\Models\Respondent;
use App\Models\Response;
use App\Models\Answer;
use App\Http\Requests\RespondentInfoRequest;
use App\Http\Requests\SectionAnswerRequest;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    /**
     * Show questionnaire landing page.
     */
    public function show(Questionnaire $questionnaire)
    {
        // Check if questionnaire is available
        if (!$questionnaire->isAvailable()) {
            return view('questionnaire.unavailable', compact('questionnaire'));
        }

        // Load sections with question counts
        $questionnaire->load(['sections' => function ($query) {
            $query->withCount('questions');
        }]);

        return view('questionnaire.show', compact('questionnaire'));
    }

    /**
     * Start questionnaire - create respondent and response.
     */
    public function start(RespondentInfoRequest $request, Questionnaire $questionnaire)
    {
        // Check availability
        if (!$questionnaire->isAvailable()) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'This questionnaire is not available.'], 400);
            }
            return redirect()->back()->with('error', 'This questionnaire is not available.');
        }

        // Create or get respondent
        $respondent = Respondent::createFromRequest($request, $request->validated());

        // Create response
        $response = Response::create([
            'questionnaire_id' => $questionnaire->id,
            'respondent_id' => $respondent->id,
            'status' => Response::STATUS_IN_PROGRESS,
            'current_section' => 1,
            'started_at' => now(),
        ]);

        // Store response ID in session
        session(['questionnaire_response_' . $questionnaire->id => $response->id]);

        // Get first section
        $firstSection = $questionnaire->sections()->first();

        if (!$firstSection) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'This questionnaire has no sections.',
                    'redirect' => route('assessment.thank-you', $questionnaire)
                ], 400);
            }
            return redirect()->route('assessment.thank-you', $questionnaire)
                ->with('error', 'This questionnaire has no sections.');
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'redirect' => route('assessment.section', [
                    'questionnaire' => $questionnaire,
                    'section' => $firstSection->id,
                ])
            ]);
        }

        return redirect()->route('assessment.section', [
            'questionnaire' => $questionnaire,
            'section' => $firstSection->id,
        ]);
    }

    /**
     * Show section questions.
     */
    public function section(Questionnaire $questionnaire, QuestionnaireSection $section)
    {
        // Verify section belongs to questionnaire
        if ($section->questionnaire_id !== $questionnaire->id) {
            abort(404);
        }

        // Get response from session
        $responseId = session('questionnaire_response_' . $questionnaire->id);

        if (!$responseId) {
            return redirect()->route('assessment.show', $questionnaire)
                ->with('error', 'Please start the questionnaire first.');
        }

        $response = Response::find($responseId);

        if (!$response || $response->status === Response::STATUS_COMPLETED) {
            return redirect()->route('assessment.show', $questionnaire);
        }

        // Load section with questions
        $section->load('questions');

        // Get existing answers for this section
        $existingAnswers = $response->answers()
            ->whereIn('question_id', $section->questions->pluck('id'))
            ->get()
            ->keyBy('question_id');

        // Calculate progress
        $totalSections = $questionnaire->sections()->count();
        $currentSectionIndex = $questionnaire->sections()
            ->where('order', '<=', $section->order)
            ->count();
        $progress = ($currentSectionIndex / $totalSections) * 100;

        return view('questionnaire.section', compact(
            'questionnaire',
            'section',
            'response',
            'existingAnswers',
            'progress',
            'totalSections',
            'currentSectionIndex'
        ));
    }

    /**
     * Submit section answers via AJAX.
     */
    public function submitSection(SectionAnswerRequest $request, Questionnaire $questionnaire, QuestionnaireSection $section)
    {
        // Get response
        $responseId = session('questionnaire_response_' . $questionnaire->id);
        $response = Response::find($responseId);

        if (!$response) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Session expired. Please start again.',
                    'redirect' => route('assessment.show', $questionnaire)
                ], 400);
            }
            return redirect()->route('assessment.show', $questionnaire);
        }

        // Save answers
        $answers = $request->input('answers', []);

        foreach ($section->questions as $question) {
            $value = $answers[$question->id] ?? null;

            // Get answer data based on question type
            $answerData = Answer::setAnswerValue($question, $value);

            // Update or create answer
            Answer::updateOrCreate(
                [
                    'response_id' => $response->id,
                    'question_id' => $question->id,
                ],
                $answerData
            );
        }

        // Update current section
        $response->update(['current_section' => $section->order + 1]);

        // Determine next step
        $nextSection = $section->getNextSection();

        if ($nextSection) {
            $redirectUrl = route('assessment.section', [
                'questionnaire' => $questionnaire,
                'section' => $nextSection->id,
            ]);

            if ($request->ajax()) {
                // Calculate new progress
                $totalSections = $questionnaire->sections()->count();
                $nextSectionIndex = $questionnaire->sections()
                    ->where('order', '<=', $nextSection->order)
                    ->count();
                $progress = ($nextSectionIndex / $totalSections) * 100;

                return response()->json([
                    'success' => true,
                    'redirect' => $redirectUrl,
                    'nextSection' => [
                        'id' => $nextSection->id,
                        'title' => $nextSection->title,
                        'description' => $nextSection->description,
                        'index' => $nextSectionIndex,
                    ],
                    'progress' => $progress,
                    'totalSections' => $totalSections,
                ]);
            }

            return redirect($redirectUrl);
        }

        // No more sections - complete the questionnaire
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'completed' => true,
                'redirect' => route('assessment.complete', $questionnaire)
            ]);
        }

        return redirect()->route('assessment.complete', $questionnaire);
    }

    /**
     * Complete assessment.
     */
    public function complete(Request $request, Questionnaire $questionnaire)
    {
        $responseId = session('questionnaire_response_' . $questionnaire->id);
        $response = Response::find($responseId);

        if ($response) {
            $response->markCompleted();

            // Store response ID for results page
            session(['last_completed_response_' . $questionnaire->id => $response->id]);
        }

        // Clear the in-progress session
        session()->forget('questionnaire_response_' . $questionnaire->id);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'redirect' => route('assessment.thank-you', $questionnaire)
            ]);
        }

        return redirect()->route('assessment.thank-you', $questionnaire);
    }

    /**
     * Show thank you page with results.
     */
    public function thankYou(Questionnaire $questionnaire)
    {
        // Try to get the most recent completed response for this session or show generic thank you
        $responseId = session('last_completed_response_' . $questionnaire->id);
        $response = null;

        if ($responseId) {
            $response = Response::with(['answers.question.section'])
                ->where('id', $responseId)
                ->where('status', Response::STATUS_COMPLETED)
                ->first();

            // Clear the session
            session()->forget('last_completed_response_' . $questionnaire->id);
        }

        return view('questionnaire.thank-you', compact('questionnaire', 'response'));
    }

    /**
     * Get section content via AJAX for seamless navigation.
     */
    public function getSectionContent(Request $request, Questionnaire $questionnaire, QuestionnaireSection $section)
    {
        // Verify section belongs to questionnaire
        if ($section->questionnaire_id !== $questionnaire->id) {
            return response()->json(['success' => false, 'message' => 'Invalid section'], 404);
        }

        // Get response from session
        $responseId = session('questionnaire_response_' . $questionnaire->id);
        $response = Response::find($responseId);

        if (!$response) {
            return response()->json([
                'success' => false,
                'message' => 'Session expired',
                'redirect' => route('assessment.show', $questionnaire)
            ], 400);
        }

        // Load section with questions
        $section->load('questions');

        // Get existing answers for this section
        $existingAnswers = $response->answers()
            ->whereIn('question_id', $section->questions->pluck('id'))
            ->get()
            ->keyBy('question_id');

        // Calculate progress
        $totalSections = $questionnaire->sections()->count();
        $currentSectionIndex = $questionnaire->sections()
            ->where('order', '<=', $section->order)
            ->count();
        $progress = ($currentSectionIndex / $totalSections) * 100;

        // Render the section content partial
        $html = view('questionnaire.partials._section-content', compact(
            'questionnaire',
            'section',
            'existingAnswers',
            'progress',
            'totalSections',
            'currentSectionIndex'
        ))->render();

        return response()->json([
            'success' => true,
            'html' => $html,
            'section' => [
                'id' => $section->id,
                'title' => $section->title,
                'description' => $section->description,
                'index' => $currentSectionIndex,
            ],
            'progress' => $progress,
            'totalSections' => $totalSections,
            'hasNext' => $section->getNextSection() !== null,
            'hasPrevious' => $section->getPreviousSection() !== null,
            'nextSectionId' => $section->getNextSection()?->id,
            'previousSectionId' => $section->getPreviousSection()?->id,
        ]);
    }
}
