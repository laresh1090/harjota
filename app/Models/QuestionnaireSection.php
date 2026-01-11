<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuestionnaireSection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'questionnaire_id',
        'title',
        'description',
        'scoring_category',
        'max_score',
        'order',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'order' => 'integer',
            'max_score' => 'integer',
        ];
    }

    /**
     * Get the questionnaire this section belongs to.
     */
    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
    }

    /**
     * Get the questions in this section.
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class)->orderBy('order');
    }

    /**
     * Get the next section.
     */
    public function getNextSection(): ?QuestionnaireSection
    {
        return self::where('questionnaire_id', $this->questionnaire_id)
            ->where('order', '>', $this->order)
            ->orderBy('order')
            ->first();
    }

    /**
     * Get the previous section.
     */
    public function getPreviousSection(): ?QuestionnaireSection
    {
        return self::where('questionnaire_id', $this->questionnaire_id)
            ->where('order', '<', $this->order)
            ->orderBy('order', 'desc')
            ->first();
    }

    /**
     * Check if this is the first section.
     */
    public function isFirst(): bool
    {
        return $this->getPreviousSection() === null;
    }

    /**
     * Check if this is the last section.
     */
    public function isLast(): bool
    {
        return $this->getNextSection() === null;
    }
}
