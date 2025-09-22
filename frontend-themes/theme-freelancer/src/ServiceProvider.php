<?php

namespace ThemeFreelancer;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Facades\Route;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        if(config('web.theme') != 'theme-freelancer') return;

        $this->mergeConfigFrom(
            __DIR__ . '/../config/frontend-theme.php',
            'frontend-theme'
        );
    }

    public function boot()
    {
        if(config('web.theme') != 'theme-freelancer') return;

        // Views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'theme-freelancer');

        // Routes
        if (! $this->app->routesAreCached()) {
            Route::middleware('web')
                ->group(__DIR__ . '/routes/web.php');
        }

        // Umožní publish configu (ak by si chcel)
        $this->publishes([
            __DIR__ . '/../config/frontend-theme.php' => config_path('frontend-theme.php'),
        ], 'config');
    }
}
