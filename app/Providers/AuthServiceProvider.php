<?php

namespace App\Providers;

use App\Auth\Guard\SessionGuard;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider {
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
    public function boot() {
        $this->registerPolicies();

        // make custom session guard
        Auth::extend('session_guard', function ($app, $name, array $config) {
            return new SessionGuard(
                Auth::createUserProvider($config['provider']),
                $app->make('request')
            );
        });
    }
}
