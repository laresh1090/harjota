<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionnaireRequest;
use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireAdminController extends Controller
{
    /**
     * Display a listing of questionnaires.
     */
    public function index(Request $request)
    {
        $questionnaires = Questionnaire::query()
            ->withCount(['sections', 'responses'])
            ->when($request->search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);

        return view('admin.questionnaires.index', compact('questionnaires'));
    }

    /**
     * Show the form for creating a new questionnaire.
     */
    public function create()
    {
        return view('admin.questionnaires.create');
    }

    /**
     * Store a newly created questionnaire.
     */
    public function store(QuestionnaireRequest $request)
    {
        $questionnaire = Questionnaire::create($request->validated());

        return redirect()
            ->route('admin.questionnaires.show', $questionnaire)
            ->with('success', 'Questionnaire created successfully.');
    }

    /**
     * Display the questionnaire builder.
     */
    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load(['sections.questions']);

        return view('admin.questionnaires.show', compact('questionnaire'));
    }

    /**
     * Show the form for editing the questionnaire.
     */
    public function edit(Questionnaire $questionnaire)
    {
        return view('admin.questionnaires.edit', compact('questionnaire'));
    }

    /**
     * Update the questionnaire.
     */
    public function update(QuestionnaireRequest $request, Questionnaire $questionnaire)
    {
        $questionnaire->update($request->validated());

        return redirect()
            ->route('admin.questionnaires.show', $questionnaire)
            ->with('success', 'Questionnaire updated successfully.');
    }

    /**
     * Remove the questionnaire.
     */
    public function destroy(Questionnaire $questionnaire)
    {
        $questionnaire->delete();

        return redirect()
            ->route('admin.questionnaires.index')
            ->with('success', 'Questionnaire deleted successfully.');
    }

    /**
     * Toggle questionnaire active status.
     */
    public function toggleStatus(Questionnaire $questionnaire)
    {
        $questionnaire->update([
            'is_active' => !$questionnaire->is_active,
        ]);

        $status = $questionnaire->is_active ? 'activated' : 'deactivated';

        return redirect()
            ->back()
            ->with('success', "Questionnaire {$status} successfully.");
    }

    /**
     * Duplicate a questionnaire.
     */
    public function duplicate(Questionnaire $questionnaire)
    {
        // Create new questionnaire
        $newQuestionnaire = $questionnaire->replicate();
        $newQuestionnaire->title = $questionnaire->title . ' (Copy)';
        $newQuestionnaire->slug = $questionnaire->slug . '-copy-' . time();
        $newQuestionnaire->is_active = false;
        $newQuestionnaire->save();

        // Duplicate sections and questions
        foreach ($questionnaire->sections as $section) {
            $newSection = $section->replicate();
            $newSection->questionnaire_id = $newQuestionnaire->id;
            $newSection->save();

            foreach ($section->questions as $question) {
                $newQuestion = $question->replicate();
                $newQuestion->questionnaire_section_id = $newSection->id;
                $newQuestion->save();
            }
        }

        return redirect()
            ->route('admin.questionnaires.show', $newQuestionnaire)
            ->with('success', 'Questionnaire duplicated successfully.');
    }
}
