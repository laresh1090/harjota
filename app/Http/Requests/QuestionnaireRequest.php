<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionnaireRequest extends FormRequest
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
        $questionnaireId = $this->route('questionnaire')?->id;

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                'alpha_dash',
                Rule::unique('questionnaires')->ignore($questionnaireId),
            ],
            'description' => ['nullable', 'string', 'max:1000'],
            'introduction' => ['nullable', 'string', 'max:5000'],
            'completion_message' => ['nullable', 'string', 'max:2000'],
            'is_active' => ['boolean'],
            'collect_contact_info' => ['boolean'],
            'published_at' => ['nullable', 'date'],
            'expires_at' => ['nullable', 'date', 'after:published_at'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Please enter a title for the questionnaire.',
            'slug.unique' => 'This URL slug is already in use.',
            'slug.alpha_dash' => 'The URL slug can only contain letters, numbers, dashes, and underscores.',
            'expires_at.after' => 'The expiry date must be after the publish date.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_active' => $this->boolean('is_active'),
            'collect_contact_info' => $this->boolean('collect_contact_info'),
        ]);
    }
}
