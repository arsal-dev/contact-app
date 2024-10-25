<?php

namespace App\Providers;

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Paginator::useBootstrap();
        // 'role'  RoleMiddleware
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
