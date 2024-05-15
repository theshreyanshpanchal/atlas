<?php

namespace Laraverse\Atlas;

use Illuminate\Support\ServiceProvider;

class IntegrationServiceProvider extends ServiceProvider
{
    protected $configFiles = [
        'database',
        'routes',
        'views',
    ];

    protected $root = __DIR__.'/..';

    public function register()
    {
        collect($this->configFiles)->each(function ($config) {
            $this->mergeConfigFrom("{$this->root}/config/$config.php", "atlas.$config");
        });
    }

    public function boot()
    {
        if (! config('atlas.routes.disable_migrations', false)) {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        }

        if (! config('atlas.views.disable_migrations', false)) {
            $this->loadViewsFrom(__DIR__.'/../resources/views', 'atlas');
        }

        if (! config('atlas.database.disable_migrations', false)) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }

        if ($this->app->runningInConsole()) {
            collect($this->configFiles)->each(function ($config) {
                $this->publishes([
                    "{$this->root}/config/$config.php" => config_path("atlas/$config.php"),
                ], 'atlas');
            });

            $this->publishes([
                __DIR__.'/../database/migrations/' => database_path('migrations'),
            ], 'atlas.migrations');
        }
    }
}
