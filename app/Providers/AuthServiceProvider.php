<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Role;
use App\Policies\UserPolicy;
use App\Policies\RolePolicy;
use App\Models\Publisher;
use App\Policies\PublisherPolicy;
use App\Models\GameConsole;
use App\Policies\GameConsolePolicy;
use App\Models\Developer;
use App\Policies\DeveloperPolicy;
use App\Models\Category;
use App\Policies\CategoryPolicy;
use App\Models\Award;
use App\Policies\AwardPolicy;
use App\Models\Game;
use App\Policies\GamePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Publisher::class => PublisherPolicy::class,
        GameConsole::class => GameConsolePolicy::class,
        Developer::class => DeveloperPolicy::class,
        Category::class => CategoryPolicy::class,
        Award::class => AwardPolicy::class,
        Game::class => GamePolicy::class,
    ];

    

    public function boot()
    {
        $this->registerPolicies();
    }
}
