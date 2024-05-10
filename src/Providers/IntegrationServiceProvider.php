<?php

namespace Laraverse\Atlas\Providers;

use Illuminate\Support\ServiceProvider;

class IntegrationServiceProvider extends ServiceProvider
{
    protected $configFiles = [
        'views',
        'routes',
        'database',
    ];

    protected $root = __DIR__.'/..';

    public function register()
    {
        collect($this->configFiles)->each(function ($config) {
            $this->mergeConfigFrom("{$this->root}/config/$config.php", "lunar-hub.$config");
        });
    }

    public function boot()
    {
        if (! config('atlas.routes.disable_migrations', false)) {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        }

        if (! config('atlas.views.disable_migrations', false)) {
            $this->loadViewsFrom(__DIR__.'/../views', 'atlas');
        }

        if (! config('atlas.database.disable_migrations', false)) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }
}
