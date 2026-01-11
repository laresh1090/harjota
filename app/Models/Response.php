<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Response extends Model
{
    /**
     * Status constants.
     */
    public const STATUS_IN_PROGRESS = 'in_progress';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_ABANDONED = 'abandoned';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'questionnaire_id',
        'respondent_id',
        'status',
        'current_section',
        'started_at',
        'completed_at',
        'time_spent_seconds',
        'total_score',
        'max_possible_score',
        'category_scores',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'current_section' => 'integer',
            'started_at' => 'datetime',
            'completed_at' => 'datetime',
            'time_spent_seconds' => 'integer',
            'total_score' => 'integer',
            'max_possible_score' => 'integer',
            'category_scores' => 'array',
        ];
    }

    /**
     * Get the questionnaire for this response.
     */
    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
    }

    /**
     * Get the respondent for this response.
     */
    public function respondent(): BelongsTo
    {
        return $this->belongsTo(Respondent::class);
    }

    /**
     * Get all answers for this response.
     */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * Scope to completed responses.
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', self::STATUS_COMPLETED);
    }

    /**
     * Scope to in-progress responses.
     */
    public function scopeInProgress($query)
    {
        return $query->where('status', self::STATUS_IN_PROGRESS);
    }

    /**
     * Mark response as completed and calculate scores.
     */
    public function markCompleted(): void
    {
        // Calculate scores
        $scores = $this->calculateScores();

        $this->update([
            'status' => self::STATUS_COMPLETED,
            'completed_at' => now(),
            'time_spent_seconds' => $this->started_at
                ? now()->diffInSeconds($this->started_at)
                : null,
            'total_score' => $scores['total_score'],
            'max_possible_score' => $scores['max_possible_score'],
            'category_scores' => $scores['category_scores'],
        ]);
    }

    /**
     * Calculate scores for this response.
     */
    public function calculateScores(): array
    {
        $categoryScores = [];
        $totalScore = 0;
        $maxPossibleScore = 0;

        // Load answers with questions
        $this->load(['answers.question.section']);

        foreach ($this->answers as $answer) {
            $question = $answer->question;
            if (!$question || !$question->section) {
                continue;
            }

            $category = $question->section->scoring_category ?? 'general';
            // Get the answer value based on question type
            $answerValue = $answer->answer_value ?? $answer->answer_text;
            $score = $question->getScoreForAnswer($answerValue);
            $maxPoints = $question->max_points ?? 0;

            // Update answer score
            $answer->update(['score' => $score]);

            // Track category scores
            if (!isset($categoryScores[$category])) {
                $categoryScores[$category] = [
                    'score' => 0,
                    'max_score' => 0,
                    'title' => $question->section->title,
                ];
            }

            $categoryScores[$category]['score'] += $score;
            $categoryScores[$category]['max_score'] += $maxPoints;

            $totalScore += $score;
            $maxPossibleScore += $maxPoints;
        }

        // Calculate percentage for each category
        foreach ($categoryScores as $category => $data) {
            $categoryScores[$category]['percentage'] = $data['max_score'] > 0
                ? round(($data['score'] / $data['max_score']) * 100)
                : 0;
        }

        return [
            'total_score' => $totalScore,
            'max_possible_score' => $maxPossibleScore,
            'category_scores' => $categoryScores,
            'overall_percentage' => $maxPossibleScore > 0
                ? round(($totalScore / $maxPossibleScore) * 100)
                : 0,
        ];
    }

    /**
     * Get overall score percentage.
     */
    public function getScorePercentageAttribute(): int
    {
        if (!$this->max_possible_score || $this->max_possible_score === 0) {
            return 0;
        }

        return (int) round(($this->total_score / $this->max_possible_score) * 100);
    }

    /**
     * Get score grade (A, B, C, D, F).
     */
    public function getScoreGradeAttribute(): string
    {
        $percentage = $this->score_percentage;

        if ($percentage >= 90) return 'A';
        if ($percentage >= 80) return 'B';
        if ($percentage >= 70) return 'C';
        if ($percentage >= 60) return 'D';
        return 'F';
    }

    /**
     * Get intelligence level description.
     */
    public function getIntelligenceLevelAttribute(): string
    {
        $percentage = $this->score_percentage;

        if ($percentage >= 85) return 'Optimized';
        if ($percentage >= 70) return 'Managed';
        if ($percentage >= 50) return 'Developing';
        if ($percentage >= 30) return 'Initial';
        return 'Ad-hoc';
    }

    /**
     * Mark response as abandoned.
     */
    public function markAbandoned(): void
    {
        $this->update([
            'status' => self::STATUS_ABANDONED,
        ]);
    }

    /**
     * Get the answer for a specific question.
     */
    public function getAnswerForQuestion(Question $question): ?Answer
    {
        return $this->answers()->where('question_id', $question->id)->first();
    }

    /**
     * Calculate completion percentage.
     */
    public function getCompletionPercentageAttribute(): int
    {
        $totalQuestions = $this->questionnaire->questions()->count();

        if ($totalQuestions === 0) {
            return 0;
        }

        $answeredQuestions = $this->answers()->count();

        return (int) round(($answeredQuestions / $totalQuestions) * 100);
    }

    /**
     * Get formatted time spent.
     */
    public function getFormattedTimeSpentAttribute(): string
    {
        if (!$this->time_spent_seconds) {
            return 'N/A';
        }

        $minutes = floor($this->time_spent_seconds / 60);
        $seconds = $this->time_spent_seconds % 60;

        if ($minutes > 0) {
            return "{$minutes}m {$seconds}s";
        }

        return "{$seconds}s";
    }
}
