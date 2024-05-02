<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Http\Middleware\EnsureUserRoleIsAllowedToAccess;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        parent::boot();

        // Register middleware
        Route::aliasMiddleware('role', EnsureUserRoleIsAllowedToAccess::class);
    }
}
