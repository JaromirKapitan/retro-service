<?php

namespace ClassicWhite;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Facades\Route;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        if(config('web.theme') != 'classic-white') return;

        $this->mergeConfigFrom(
            __DIR__ . '/../config/frontend-theme.php',
            'frontend-theme'
        );
    }

    public function boot()
    {
        if(config('web.theme') != 'classic-white') return;

        // Views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'classic-white');

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
