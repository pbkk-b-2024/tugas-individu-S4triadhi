<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine if the user can view the user list.
     */
    public function viewAny(User $authUser)
    {
        // Only users with the "Admin" role can view the user list
        return $authUser->hasRole('Admin');
    }

    /**
     * Determine if the user can create a new user.
     */
    public function create(User $authUser)
    {
        return $authUser->hasRole('Admin'); // Only Admin can create users
    }

    /**
     * Determine if the user can edit an existing user.
     */
    public function update(User $authUser, User $user)
    {
        return $authUser->hasRole('Admin'); // Only Admin can edit users
    }

    /**
     * Determine if the user can delete a user.
     */
    public function delete(User $authUser, User $user)
    {
        return $authUser->hasRole('Admin'); // Only Admin can delete users
    }
}
