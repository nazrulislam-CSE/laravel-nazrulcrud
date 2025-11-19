<?php

namespace NazrulCrud\Crud;

use Illuminate\Support\ServiceProvider;

class CrudServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        
        // Views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'crud');
        
        // Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        
        // Publishing assets
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/crud'),
        ], 'crud-views');
        
        $this->publishes([
            __DIR__.'/../config/crud.php' => config_path('crud.php'),
        ], 'crud-config');
    }

    public function register()
    {
        // Merge config
        $this->mergeConfigFrom(
            __DIR__.'/../config/crud.php', 'crud'
        );
    }
}