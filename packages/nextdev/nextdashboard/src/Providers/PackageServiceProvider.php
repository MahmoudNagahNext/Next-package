<?php

namespace nextdev\nextdashboard\Providers;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../../routes/api.php');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        // Publish config
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('config.php'),
        ]);

        // Publish migrations
        $this->publishes([
            __DIR__.'/../../database/migrations' => database_path('migrations'),
        ], 'nextdashboard-migrations');
    }

    public function register()
    {
        // Merge package config
        // $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravelusermanager');
    }
}