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

        /* Grant "Super Admin" role all permission checks using can() */
        Gate::before(function ($user) {
            if ($user->hasRole('super-admin')) {
                return true;
            }
        });

        /* define a admin user role */
        Gate::define('admin', function($user) {
            if ($user->hasRole('admin')) {
                return true;
            }
        });

        /* define a teacher user role */
        Gate::define('teacher', function($user) {
            if ($user->hasRole('teacher')) {
                return true;
            }
        });

        /* define a student role */
        Gate::define('student', function($user) {
            if ($user->hasRole('student')) {
                return true;
            }
        });
    }
}
