<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Gate::define('create-blog', function ($user) {
            return $user->hasAnyRole([
                'admin',
                'blogger'
            ]);
        });
        Gate::define('create-product', function ($user) {
            return $user->hasAnyRole([
                'admin',
                'manager',

            ]);
        });
        Gate::define('access-dashboard', function ($user) {
            return $user->hasAnyRole([
                'admin',
                'manager'
            ]);
        });

        // ADDED
        Gate::define('manage-users', function ($user) {
            return $user->hasRole('admin');
        });

        // ADDED
        Gate::define('manage-roles', function ($user) {
            return $user->hasRole('admin');
        });

        // ADDED
        Gate::define('manage-tags', function ($user) {
            return $user->hasAnyRole([
                'admin',
                'manager',
                'blogger'
            ]);
        });

        // ADDED
        Gate::define('manage-products', function ($user) {
            return $user->hasAnyRole([
                'admin',
                'manager'
            ]);
        });

        // ADDED
        Gate::define('manage-blogs', function ($user) {
            return $user->hasAnyRole([
                'admin',
                'manager',
                'blogger'
            ]);
        });
    }
}
