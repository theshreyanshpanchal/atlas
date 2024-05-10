<?php

namespace Laraverse\Atlas\Providers;

use Illuminate\Support\ServiceProvider;

class IntegrationServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'atlas');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
