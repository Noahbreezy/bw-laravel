<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route; // Import the Route facade
use App\Models\User;

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
        // Define a gate for checking admin permissions
        Gate::define('create-posts', function (User $user) {
            return $user->isAdmin(); // Check if the user is an admin
        });

        // Define a gate for editing posts
        Gate::define('edit-posts', function (User $user) {
            return $user->isAdmin(); // Check if the user is an admin
        });

        // Define a gate for deleting posts
        Gate::define('delete-posts', function (User $user) {
            return $user->isAdmin(); // Check if the user is an admin
        });

        // Define a gate for admin permissions
        Gate::define('admin', function (User $user) {
            return $user->isAdmin(); // Check if the user is an admin
        });

        // Dynamically register the 'admin' middleware
        Route::aliasMiddleware('admin', function ($request, $next) {
            if (!auth()->check() || !auth()->user()->can('admin')) {
                abort(403, 'Unauthorized');
            }
            return $next($request);
        });
    }
}
