<?php

namespace Laraverse\Atlas;

use Illuminate\Support\ServiceProvider;

class AtlasServiceProvider extends ServiceProvider
{
    protected $configs = [

        'assets',

        'configs',
        
        'database',

        'models',
        
        'routes',
        
        'views',
    ];

    protected $root = __DIR__ . '/..';

    public function register()
    {
        collect($this->configs)->each(function ($config) {

            $path = "{$this->root}/config/$config.php";
            
            $key = "atlas.$config";

            $this->mergeConfigFrom( $path, $key );

        });
    }

    public function boot()
    {
        $loadRoutes = config('atlas.routes.load_routes', true);

        if ($loadRoutes) { $this->loadRoutesFrom(__DIR__ . '/../routes/web.php'); }
        
        $loadViews = config('atlas.views.load_views', true);

        if ($loadViews) { $this->loadViewsFrom(__DIR__ . '/../resources/views', 'atlas'); }
        
        $loadMigrations = config('atlas.database.load_migrations', true);

        if ($loadMigrations) { $this->loadMigrationsFrom(__DIR__ . '/../database/migrations'); }

        if ($this->app->runningInConsole()) {
            
            $publishConfigs = config('atlas.configs.publish_configs', true);

            if ($publishConfigs) {

                collect($this->configs)->each(function ($config) {
                    
                    $group = 'atlas';
    
                    $paths = ["{$this->root}/config/$config.php" => config_path("atlas/$config.php") ];
    
                    $this->publishes($paths, $group);
    
                });

            }

            $publishModels = config('atlas.models.publish_models', false);

            if ($publishModels) { $this->publishes([__DIR__ . '/Models/' => app_path('Models') ], 'atlas.models'); }

            $publishModels = config('atlas.database.publish_migrations', false);

            if ($publishModels) { $this->publishes([__DIR__ . '/../database/migrations/' => database_path('migrations') ], 'atlas.migrations'); }

            $publishViews = config('atlas.views.publish_views', false);

            if ($publishViews) { $this->publishes([__DIR__ . '/../resources/views' => resource_path('views/vendor/atlas')], 'atlas'); }

            $publishAssets = config('atlas.assets.publish_assets', true);

            if ($publishAssets) {
                
                $this->publishes([__DIR__ . '/../resources/svgs' => public_path('svgs')], 'atlas');

                $this->publishes([__DIR__ . '/../resources/images' => public_path('images')], 'atlas');

                $this->publishes([__DIR__ . '/../resources/favicon' => public_path('favicon')], 'atlas');
            
            }

            $this->commands([ Commands\InstallAtlas::class ]);

        }

    }

}
