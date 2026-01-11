<?php

namespace App\Http\Requests;

use App\Models\Question;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'question_text' => ['required', 'string', 'max:500'],
            'help_text' => ['nullable', 'string', 'max:500'],
            'question_type' => [
                'required',
                Rule::in(array_keys(Question::TYPES)),
            ],
            'is_required' => ['boolean'],
            'order' => ['nullable', 'integer', 'min:0'],
            'validation_rules' => ['nullable', 'string', 'max:255'],
        ];

        // Options are required for certain question types
        if ($this->requiresOptions()) {
            $rules['options'] = ['required', 'array', 'min:1'];
            $rules['options.*'] = ['required', 'string', 'max:255'];
        } else {
            $rules['options'] = ['nullable', 'array'];
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'question_text.required' => 'Please enter the question text.',
            'question_type.required' => 'Please select a question type.',
            'question_type.in' => 'Invalid question type selected.',
            'options.required' => 'Please provide options for this question type.',
            'options.min' => 'Please provide at least one option.',
            'options.*.required' => 'Option text cannot be empty.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_required' => $this->boolean('is_required'),
        ]);

        // Convert options from textarea (newline-separated) to key-value pairs
        if ($this->has('options')) {
            $rawOptions = $this->options;

            // Handle array input (from textarea with name="options[]")
            if (is_array($rawOptions)) {
                $rawOptions = implode("\n", $rawOptions);
            }

            // Split by newlines and filter empty values
            $lines = array_filter(
                array_map('trim', preg_split('/\r\n|\r|\n/', $rawOptions)),
                fn($line) => !empty($line)
            );

            // Create key-value pairs
            $options = [];
            foreach (array_values($lines) as $index => $option) {
                $key = 'option_' . ($index + 1);
                $options[$key] = $option;
            }

            $this->merge(['options' => $options]);
        }
    }

    /**
     * Check if the question type requires options.
     */
    protected function requiresOptions(): bool
    {
        return in_array($this->question_type, [
            Question::TYPE_RADIO,
            Question::TYPE_CHECKBOX,
            Question::TYPE_SELECT,
        ]);
    }
}
