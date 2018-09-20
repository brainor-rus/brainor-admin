<?php

namespace Bradmin\Providers;

use Illuminate\Support\ServiceProvider;

class BrAdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // load config
        $this->mergeConfigFrom(__DIR__.'/../../config/bradmin.php', 'bradmin');

        // load routes
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');

        // load view files
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'bradmin');

        // publish files
        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views/bradmin'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}