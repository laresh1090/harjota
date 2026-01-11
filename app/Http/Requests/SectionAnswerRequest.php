<?php

namespace App\Http\Requests;

use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;

class SectionAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Public form
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $section = $this->route('section');
        $rules = [];

        if ($section) {
            foreach ($section->questions as $question) {
                $questionRules = $question->getValidationRules();
                $rules["answers.{$question->id}"] = $questionRules;
            }
        }

        return $rules;
    }

    /**
     * Get custom attribute names for error messages.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        $section = $this->route('section');
        $attributes = [];

        if ($section) {
            foreach ($section->questions as $question) {
                $attributes["answers.{$question->id}"] = "'{$question->question_text}'";
            }
        }

        return $attributes;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'answers.*.required' => 'This question requires an answer.',
            'answers.*.in' => 'Please select a valid option.',
            'answers.*.array' => 'Please select at least one option.',
        ];
    }
}
