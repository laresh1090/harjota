<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Http\Requests\ReorderRequest;
use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\QuestionnaireSection;

class QuestionController extends Controller
{
    /**
     * Show the form for creating a new question.
     */
    public function create(Questionnaire $questionnaire, QuestionnaireSection $section)
    {
        $questionTypes = Question::TYPES;

        return view('admin.questions.create', compact('questionnaire', 'section', 'questionTypes'));
    }

    /**
     * Store a newly created question.
     */
    public function store(QuestionRequest $request, Questionnaire $questionnaire, QuestionnaireSection $section)
    {
        $maxOrder = $section->questions()->max('order') ?? 0;

        $question = $section->questions()->create([
            ...$request->validated(),
            'order' => $maxOrder + 1,
        ]);

        return redirect()
            ->route('admin.questionnaires.show', $questionnaire)
            ->with('success', 'Question created successfully.');
    }

    /**
     * Show the form for editing a question.
     */
    public function edit(Questionnaire $questionnaire, QuestionnaireSection $section, Question $question)
    {
        $questionTypes = Question::TYPES;

        return view('admin.questions.edit', compact('questionnaire', 'section', 'question', 'questionTypes'));
    }

    /**
     * Update the question.
     */
    public function update(QuestionRequest $request, Questionnaire $questionnaire, QuestionnaireSection $section, Question $question)
    {
        $question->update($request->validated());

        return redirect()
            ->route('admin.questionnaires.show', $questionnaire)
            ->with('success', 'Question updated successfully.');
    }

    /**
     * Remove the question.
     */
    public function destroy(Questionnaire $questionnaire, QuestionnaireSection $section, Question $question)
    {
        $question->delete();

        return redirect()
            ->route('admin.questionnaires.show', $questionnaire)
            ->with('success', 'Question deleted successfully.');
    }

    /**
     * Reorder questions.
     */
    public function reorder(ReorderRequest $request, Questionnaire $questionnaire, QuestionnaireSection $section)
    {
        foreach ($request->items as $item) {
            Question::where('id', $item['id'])
                ->where('questionnaire_section_id', $section->id)
                ->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }
}
