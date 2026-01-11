<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Respondent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'organization',
        'job_title',
        'ip_address',
        'user_agent',
    ];

    /**
     * Get all responses by this respondent.
     */
    public function responses(): HasMany
    {
        return $this->hasMany(Response::class);
    }

    /**
     * Get display name (name or email or 'Anonymous').
     */
    public function getDisplayNameAttribute(): string
    {
        return $this->name ?: $this->email ?: 'Anonymous';
    }

    /**
     * Check if respondent has contact info.
     */
    public function hasContactInfo(): bool
    {
        return !empty($this->name) || !empty($this->email) || !empty($this->phone);
    }

    /**
     * Create from request data.
     */
    public static function createFromRequest($request, array $contactData = []): self
    {
        return self::create([
            'name' => $contactData['name'] ?? null,
            'email' => $contactData['email'] ?? null,
            'phone' => $contactData['phone'] ?? null,
            'organization' => $contactData['organization'] ?? null,
            'job_title' => $contactData['job_title'] ?? null,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);
    }
}
