<?php

namespace Bradmin\Providers;

use Illuminate\Support\ServiceProvider;
use Bradmin\Plugins\PluginManager;

class BrAdminServiceProvider extends ServiceProvider
{
    public $allPluginsNavigation = [];

    public function __construct(\Illuminate\Contracts\Foundation\Application  $app=null)
    {
       $this->allPluginsNavigation;
        parent::__construct($app);
    }

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
        $this->app->singleton('PluginManager', function($app)
        {
            return new PluginManager();
        });

        $pluginManager = $this->app->make('PluginManager');

        // Register other plugin Service Providers in a loop here
        foreach ($pluginManager->getInstalledPlugins() as $pluginProviders)
        {
            foreach ($pluginProviders['providers'] as $pluginProvider)
            {
                $this->app->register($pluginProvider['nameSpace'].'\\'.$pluginProvider['class']);
            }
        }
    }
}