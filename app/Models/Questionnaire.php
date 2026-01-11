<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Str;

class Questionnaire extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'introduction',
        'completion_message',
        'is_active',
        'collect_contact_info',
        'published_at',
        'expires_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'collect_contact_info' => 'boolean',
            'published_at' => 'datetime',
            'expires_at' => 'datetime',
        ];
    }

    /**
     * Boot the model.
     */
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($questionnaire) {
            if (empty($questionnaire->slug)) {
                $questionnaire->slug = Str::slug($questionnaire->title);
            }
        });
    }

    /**
     * Get the sections for this questionnaire.
     */
    public function sections(): HasMany
    {
        return $this->hasMany(QuestionnaireSection::class)->orderBy('order');
    }

    /**
     * Get all questions through sections.
     */
    public function questions(): HasManyThrough
    {
        return $this->hasManyThrough(
            Question::class,
            QuestionnaireSection::class,
            'questionnaire_id',
            'questionnaire_section_id',
            'id',
            'id'
        );
    }

    /**
     * Get the responses for this questionnaire.
     */
    public function responses(): HasMany
    {
        return $this->hasMany(Response::class);
    }

    /**
     * Scope to only active questionnaires.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to only published questionnaires.
     */
    public function scopePublished($query)
    {
        return $query->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('expires_at')
                    ->orWhere('expires_at', '>', now());
            });
    }

    /**
     * Check if questionnaire is currently available.
     */
    public function isAvailable(): bool
    {
        if (!$this->is_active) {
            return false;
        }

        if ($this->published_at && $this->published_at->isFuture()) {
            return false;
        }

        if ($this->expires_at && $this->expires_at->isPast()) {
            return false;
        }

        return true;
    }

    /**
     * Get completed responses count.
     */
    public function getCompletedCountAttribute(): int
    {
        return $this->responses()->where('status', 'completed')->count();
    }

    /**
     * Get the route key name for route model binding.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
