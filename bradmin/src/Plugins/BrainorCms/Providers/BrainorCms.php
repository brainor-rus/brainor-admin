<?php
/**
 * class: BrainorCms
 * nameSpace: Bradmin\Plugins\BrainorCms\Providers
 */
namespace Bradmin\Plugins\BrainorCms\Providers;

use Illuminate\Support\ServiceProvider;
use Bradmin\Plugins\BrainorCms\Navigation\PluginNavigation;

class BrainorCms extends ServiceProvider
{
    public $navigation;

    public function __construct(\Illuminate\Contracts\Foundation\Application  $app=null)
    {
        $this->navigation = PluginNavigation::getPluginNav();
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
        $this->mergeConfigFrom(__DIR__.'/../../../../config/bradmin.php', 'bradmin');
        // load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        // load view files
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'brainor_cms');
        // publish files
        $this->publishes([__DIR__.'/../resources/views' => resource_path('views/bradmin/brainor_cms')]);
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