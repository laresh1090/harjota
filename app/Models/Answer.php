<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'response_id',
        'question_id',
        'answer_text',
        'answer_array',
        'answer_value',
        'score',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'answer_array' => 'array',
            'score' => 'integer',
        ];
    }

    /**
     * Get the response this answer belongs to.
     */
    public function response(): BelongsTo
    {
        return $this->belongsTo(Response::class);
    }

    /**
     * Get the question this answer is for.
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Get the display value based on question type.
     */
    public function getDisplayValueAttribute(): string
    {
        $question = $this->question;

        switch ($question->question_type) {
            case Question::TYPE_TEXT:
            case Question::TYPE_TEXTAREA:
                return $this->answer_text ?: '';

            case Question::TYPE_RADIO:
            case Question::TYPE_SELECT:
                if ($this->answer_value && $question->options) {
                    return $question->options[$this->answer_value] ?? $this->answer_value;
                }
                return $this->answer_value ?: '';

            case Question::TYPE_CHECKBOX:
                if ($this->answer_array && $question->options) {
                    $labels = [];
                    foreach ($this->answer_array as $value) {
                        $labels[] = $question->options[$value] ?? $value;
                    }
                    return implode(', ', $labels);
                }
                return '';

            case Question::TYPE_YES_NO:
                return $this->answer_value === 'yes' ? 'Yes' : 'No';

            default:
                return $this->answer_text ?: $this->answer_value ?: '';
        }
    }

    /**
     * Get the raw value for export.
     */
    public function getRawValueAttribute(): mixed
    {
        if ($this->answer_array) {
            return $this->answer_array;
        }

        return $this->answer_text ?: $this->answer_value;
    }

    /**
     * Get selected options for checkbox/radio/select questions.
     * Used by the public questionnaire form to repopulate answers.
     */
    public function getSelectedOptionsAttribute(): mixed
    {
        if ($this->answer_array) {
            return $this->answer_array;
        }

        return $this->answer_value;
    }

    /**
     * Set the answer value based on question type.
     */
    public static function setAnswerValue(Question $question, $value): array
    {
        $data = [
            'answer_text' => null,
            'answer_array' => null,
            'answer_value' => null,
        ];

        if ($value === null || $value === '') {
            return $data;
        }

        switch ($question->question_type) {
            case Question::TYPE_TEXT:
            case Question::TYPE_TEXTAREA:
                $data['answer_text'] = $value;
                break;

            case Question::TYPE_CHECKBOX:
                $data['answer_array'] = is_array($value) ? $value : [$value];
                break;

            case Question::TYPE_RADIO:
            case Question::TYPE_SELECT:
            case Question::TYPE_YES_NO:
                $data['answer_value'] = $value;
                break;
        }

        return $data;
    }
}
