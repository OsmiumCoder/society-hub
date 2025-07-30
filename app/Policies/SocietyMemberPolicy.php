<?php

namespace App\Policies;

use App\Models\Society;
use App\Models\SocietyMember;
use App\Models\User;
use App\SocietyMemberRole;

class SocietyMemberPolicy extends BasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user, Society $society): bool
    {
        return $society->userHasRole($user, [
            SocietyMemberRole::Admin,
            SocietyMemberRole::Owner,
        ]);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Society $society): bool
    {
        return $society->userHasRole($user, [
            SocietyMemberRole::Admin,
            SocietyMemberRole::Owner,
        ]);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Society $society, SocietyMember $societyMember): bool
    {
        return $society->userHasRole($user, [
            SocietyMemberRole::Admin,
            SocietyMemberRole::Owner,
        ]);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Society $society, SocietyMember $societyMember): bool
    {
        return $society->userHasRole($user, [
            SocietyMemberRole::Admin,
            SocietyMemberRole::Owner,
        ]);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Society $society, SocietyMember $societyMember): bool
    {
        return $society->userHasRole($user, [
            SocietyMemberRole::Admin,
            SocietyMemberRole::Owner,
        ]);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Society $society, SocietyMember $societyMember): bool
    {
        return $society->userHasRole($user, [
            SocietyMemberRole::Admin,
            SocietyMemberRole::Owner,
        ]);
    }
}
