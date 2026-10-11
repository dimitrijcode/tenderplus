<?php

namespace App\Models;

use Database\Factories\TenderFactory;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tender extends Model
{
    /** @use HasFactory<TenderFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'organization_name',
        'location',
        'budget',
        'deadline',
        'source_url',
        'is_public',
        'status',
        'user_id',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'deadline' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function keywords(): BelongsToMany
    {
        return $this->belongsToMany(Keyword::class);
    }

    #[Scope]
    protected function public(Builder $query): void
    {
        $query->where('is_public', true);
    }

    #[Scope]
    protected function open(Builder $query): void
    {
        $query->where('status', 'open')
            ->where(fn ($q) => $q->whereNull('deadline')->orWhere('deadline', '>', now()));
    }

    public function canChange(User $user): bool
    {
        if ($user->id === $this->user_id) {
            return true;
        }

        return $user->role === 'admin';
    }
}
