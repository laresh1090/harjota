<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    /**
     * Question type constants.
     */
    public const TYPE_TEXT = 'text';
    public const TYPE_TEXTAREA = 'textarea';
    public const TYPE_RADIO = 'radio';
    public const TYPE_CHECKBOX = 'checkbox';
    public const TYPE_SELECT = 'select';
    public const TYPE_YES_NO = 'yes_no';

    /**
     * Available question types.
     */
    public const TYPES = [
        self::TYPE_TEXT => 'Short Text',
        self::TYPE_TEXTAREA => 'Long Text',
        self::TYPE_RADIO => 'Single Choice (Radio)',
        self::TYPE_CHECKBOX => 'Multiple Choice (Checkbox)',
        self::TYPE_SELECT => 'Dropdown Select',
        self::TYPE_YES_NO => 'Yes/No',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'questionnaire_section_id',
        'question_text',
        'help_text',
        'question_type',
        'options',
        'score_values',
        'max_points',
        'is_required',
        'order',
        'validation_rules',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'options' => 'array',
            'score_values' => 'array',
            'max_points' => 'integer',
            'is_required' => 'boolean',
            'order' => 'integer',
        ];
    }

    /**
     * Get the score for a given answer.
     */
    public function getScoreForAnswer($answer): int
    {
        if (!$this->score_values || !$this->options) {
            return 0;
        }

        $optionIndex = array_search($answer, $this->options);

        if ($optionIndex === false || !isset($this->score_values[$optionIndex])) {
            return 0;
        }

        return (int) $this->score_values[$optionIndex];
    }

    /**
     * Get the section this question belongs to.
     */
    public function section(): BelongsTo
    {
        return $this->belongsTo(QuestionnaireSection::class, 'questionnaire_section_id');
    }

    /**
     * Get the questionnaire through section.
     */
    public function questionnaire()
    {
        return $this->section->questionnaire;
    }

    /**
     * Get all answers for this question.
     */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * Check if question requires options.
     */
    public function requiresOptions(): bool
    {
        return in_array($this->question_type, [
            self::TYPE_RADIO,
            self::TYPE_CHECKBOX,
            self::TYPE_SELECT,
        ]);
    }

    /**
     * Check if question allows multiple answers.
     */
    public function allowsMultipleAnswers(): bool
    {
        return $this->question_type === self::TYPE_CHECKBOX;
    }

    /**
     * Get validation rules for this question.
     */
    public function getValidationRules(): array
    {
        $rules = [];

        if ($this->is_required) {
            $rules[] = 'required';
        } else {
            $rules[] = 'nullable';
        }

        switch ($this->question_type) {
            case self::TYPE_TEXT:
                $rules[] = 'string';
                $rules[] = 'max:255';
                break;
            case self::TYPE_TEXTAREA:
                $rules[] = 'string';
                $rules[] = 'max:5000';
                break;
            case self::TYPE_RADIO:
            case self::TYPE_SELECT:
                if ($this->options) {
                    // Use Rule::in() to properly handle options with commas and special characters
                    $rules[] = \Illuminate\Validation\Rule::in(array_values($this->options));
                }
                break;
            case self::TYPE_CHECKBOX:
                $rules[] = 'array';
                break;
            case self::TYPE_YES_NO:
                $rules[] = 'in:yes,no';
                break;
        }

        if ($this->validation_rules) {
            $customRules = explode('|', $this->validation_rules);
            $rules = array_merge($rules, $customRules);
        }

        return $rules;
    }

    /**
     * Get the input name for forms.
     */
    public function getInputName(): string
    {
        return "answers[{$this->id}]";
    }

    /**
     * Get the input ID for forms.
     */
    public function getInputId(): string
    {
        return "question_{$this->id}";
    }
}
