<?php

namespace App\Providers;

use Illuminate\Container\Attributes\Auth;
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
        view()->composer('penjual.dashboardpenjuallpg', function ($view) {
            $view->with('user', auth()->user());
        });
    }
}
