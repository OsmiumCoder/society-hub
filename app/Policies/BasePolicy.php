<?php

namespace App\Policies;

use App\Models\User;

class BasePolicy
{
    /**
     * Perform pre-authorization checks.
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->isSiteAdmin()) {
            return true;
        }

        return null;
    }
}
