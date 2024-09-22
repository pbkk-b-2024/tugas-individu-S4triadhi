<?php

namespace App\Policies;

use App\Models\GameConsole;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GameConsolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can view any game console.
     */
    public function viewAny(User $user)
    {
        return $user->hasRole('Admin') || $user->hasRole('Writer') || $user->hasRole('Member');
    }

    /**
     * Determine if the given user can view the game console.
     */
    public function view(User $user, GameConsole $gameConsole)
    {
        return $this->viewAny($user);
    }

    /**
     * Determine if the given user can create game consoles.
     */
    public function create(User $user)
    {
        return $user->hasRole('Admin');
    }

    /**
     * Determine if the given user can update the game console.
     */
    public function update(User $user, GameConsole $gameConsole)
    {
        return $user->hasRole('Admin') || $user->hasRole('Writer');
    }

    /**
     * Determine if the given user can delete the game console.
     */
    public function delete(User $user, GameConsole $gameConsole)
    {
        return $user->hasRole('Admin');
    }
}
