<?php

declare(strict_types=1);

namespace App\Providers;

use Eloquent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Eloquent::preventLazyLoading(! app()->isProduction());
    }
}
