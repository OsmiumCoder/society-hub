<?php

namespace App\Models;

use App\SocietyMemberRole;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SocietyMember extends Pivot
{
    use HasUuids;

    protected function casts(): array
    {
        return [
            'role' => SocietyMemberRole::class,
            ''
        ];
    }
}
