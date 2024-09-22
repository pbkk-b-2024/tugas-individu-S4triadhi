<?php

namespace App\Policies;

use App\Models\Publisher;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PublisherPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can view any publisher.
     */
    public function viewAny(User $user)
    {
        return $user->hasRole('Admin') || $user->hasRole('Writer') || $user->hasRole('Member');
    }

    /**
     * Determine if the given user can view the publisher.
     */
    public function view(User $user, Publisher $publisher)
    {
        return $this->viewAny($user);
    }

    /**
     * Determine if the given user can create publishers.
     */
    public function create(User $user)
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine if the given user can update the publisher.
     */
    public function update(User $user, Publisher $publisher)
    {
        return $user->hasRole('Admin') || $user->hasRole('Writer');
    }

    /**
     * Determine if the given user can delete the publisher.
     */
    public function delete(User $user, Publisher $publisher)
    {
        return $user->hasRole('Admin');
    }
    
}
