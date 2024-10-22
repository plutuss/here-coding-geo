<?php

namespace Plutuss\HerePlatform\Providers;

use Illuminate\Support\ServiceProvider;
use Plutuss\HerePlatform\Services\GeoCodingService;
use Plutuss\HerePlatform\Contracts\Services\GeoCodingInterface;

class GeoCodingServiceProvider extends ServiceProvider
{

    public function register(): void
    {

        $this->app->singleton(GeoCodingInterface::class, function ($app): GeoCodingInterface {
            return GeoCodingService::getInstance();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/here-platform.php' => config_path('here-platform.php'),
        ]);
    }

}
