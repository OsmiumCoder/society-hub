<?php

namespace App\Models;

use App\SocietyMemberRole;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Carbon;

class SocietyMember extends Pivot
{
    use HasUuids;

    protected $appends = [
        'is_expired'
    ];

    protected function isExpired(): Attribute
    {
        return new Attribute(
            get: function () {
                if (!$this->renewed_at) {
                    return true;
                }

                $now = Carbon::now();
                $renewedDate = Carbon::parse($this->renewed_at);

                $currentYearStart = $now->month < 9 || ($now->month == 9 && $now->day < 6)
                    ? Carbon::create($now->year - 1, 9, 6)
                    : Carbon::create($now->year, 9, 6);

                return $renewedDate->lessThan($currentYearStart);
            },
        );
    }

    protected function casts(): array
    {
        return [
            'role' => SocietyMemberRole::class,
        ];
    }
}
