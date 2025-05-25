<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Society extends Model
{
    /** @use HasFactory<\Database\Factories\SocietyFactory> */
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tags' => 'array',
        ];
    }

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'society_members', 'society_id', 'user_id')
            ->using(SocietyMember::class);
    }

    public function userHasRole(User $user, $roles): bool
    {
        $roles = is_array($roles) ? $roles : [$roles];

        return $this->members()
            ->where('user_id', $user->id)
            ->whereIn('role', $roles)
            ->exists();
    }
}
