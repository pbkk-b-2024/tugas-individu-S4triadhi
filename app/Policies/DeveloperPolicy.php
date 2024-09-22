<?php

namespace App\Policies;

use App\Models\Developer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeveloperPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can view any developers.
     */
    public function viewAny(User $user)
    {
        return $user->hasRole('Admin') || $user->hasRole('Writer') || $user->hasRole('Member');
    }

    /**
     * Determine if the given user can view the developer.
     */
    public function view(User $user, Developer $developer)
    {
        return $this->viewAny($user);
    }

    /**
     * Determine if the given user can create developers.
     */
    public function create(User $user)
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine if the given user can update the developer.
     */
    public function update(User $user, Developer $developer)
    {
        return $user->hasRole('Admin') || $user->hasRole('Writer');
    }

    /**
     * Determine if the given user can delete the developer.
     */
    public function delete(User $user, Developer $developer)
    {
        return $user->hasRole('Admin');
    }
}
