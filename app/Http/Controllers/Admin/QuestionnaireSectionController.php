<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionnaireSectionRequest;
use App\Http\Requests\ReorderRequest;
use App\Models\Questionnaire;
use App\Models\QuestionnaireSection;

class QuestionnaireSectionController extends Controller
{
    /**
     * Show the form for creating a new section.
     */
    public function create(Questionnaire $questionnaire)
    {
        return view('admin.sections.create', compact('questionnaire'));
    }

    /**
     * Store a newly created section.
     */
    public function store(QuestionnaireSectionRequest $request, Questionnaire $questionnaire)
    {
        $maxOrder = $questionnaire->sections()->max('order') ?? 0;

        $section = $questionnaire->sections()->create([
            ...$request->validated(),
            'order' => $maxOrder + 1,
        ]);

        return redirect()
            ->route('admin.questionnaires.show', $questionnaire)
            ->with('success', 'Section created successfully.');
    }

    /**
     * Show the form for editing a section.
     */
    public function edit(Questionnaire $questionnaire, QuestionnaireSection $section)
    {
        return view('admin.sections.edit', compact('questionnaire', 'section'));
    }

    /**
     * Update the section.
     */
    public function update(QuestionnaireSectionRequest $request, Questionnaire $questionnaire, QuestionnaireSection $section)
    {
        $section->update($request->validated());

        return redirect()
            ->route('admin.questionnaires.show', $questionnaire)
            ->with('success', 'Section updated successfully.');
    }

    /**
     * Remove the section.
     */
    public function destroy(Questionnaire $questionnaire, QuestionnaireSection $section)
    {
        $section->delete();

        return redirect()
            ->route('admin.questionnaires.show', $questionnaire)
            ->with('success', 'Section deleted successfully.');
    }

    /**
     * Reorder sections.
     */
    public function reorder(ReorderRequest $request, Questionnaire $questionnaire)
    {
        foreach ($request->items as $item) {
            QuestionnaireSection::where('id', $item['id'])
                ->where('questionnaire_id', $questionnaire->id)
                ->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }
}
