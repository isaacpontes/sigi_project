<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manageAllChurches', function ($user) {
            return $user->system_admin;
        });

        Gate::define('manageAllUsers', function ($user) {
            return $user->system_admin;
        });

        Gate::define('manageChurchUsers', function ($user) {
            return $user->church_admin;
        });

        Gate::define('manageChurch', function ($user, $church) {
            return $user->church_id === $church->id && $user->church_admin;
        });

        Gate::define('manageUser', function ($user, $current_user) {
            return $user->id === $current_user->id;
        });

        Gate::define('manageFinances', function($user) {
            return $user->finances_admin;
        });

        Gate::define('manageMembership', function($user) {
            return $user->members_admin;
        });
    }
}
