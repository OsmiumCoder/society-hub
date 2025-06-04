<?php

namespace App;

enum SocietyMemberRole: int
{
    case MEMBER = 1;
    case ADMIN = 2;
    case OWNER = 3;

    public function label(): string
    {
        return match ($this) {
            self::MEMBER => 'Member',
            self::ADMIN => 'Admin',
            self::OWNER => 'Owner',
        };
    }

    public static function asSelectArray(): array
    {
        return array_map(function ($case) {
            return [
                'name' => $case->label(),
                'value' => $case->value,
            ];
        }, self::cases());
    }
}
