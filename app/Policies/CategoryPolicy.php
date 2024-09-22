<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can view any categories.
     */
    public function viewAny(User $user)
    {
        return $user->hasRole('Admin') || $user->hasRole('Writer') || $user->hasRole('Member');
    }

    /**
     * Determine if the given user can view the category.
     */
    public function view(User $user, Category $category)
    {
        return $this->viewAny($user);
    }

    /**
     * Determine if the given user can create categories.
     */
    public function create(User $user)
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine if the given user can update the category.
     */
    public function update(User $user, Category $category)
    {
        return $user->hasRole('Admin') || $user->hasRole('Writer');
    }

    /**
     * Determine if the given user can delete the category.
     */
    public function delete(User $user, Category $category)
    {
        return $user->hasRole('Admin');
    }
}
