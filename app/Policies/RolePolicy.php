<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Role;

class RolePolicy
{
    /**
     * Determine whether the user can view any roles.
     */
    public function viewAny(User $user)
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can view a specific role.
     */
    public function view(User $user, Role $role)
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can create roles.
     */
    public function create(User $user)
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can update the role.
     */
    public function update(User $user, Role $role)
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can delete the role.
     */
    public function delete(User $user, Role $role)
    {
        return $user->hasRole('Admin');
    }
}
