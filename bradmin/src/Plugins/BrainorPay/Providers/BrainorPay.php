<?php
/**
 * class: BrainorPay
 * nameSpace: Bradmin\Plugins\BrainorPay\Providers
 */
namespace Bradmin\Plugins\BrainorPay\Providers;

use Illuminate\Support\ServiceProvider;
use Bradmin\Plugins\BrainorPay\Navigation\PluginNavigation;
use Bradmin\Plugins\BrainorPay\Helpers\Payment;
use Bradmin\Plugins\BrainorPay\Helpers\GetData;

class BrainorPay extends ServiceProvider
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
        $this->mergeConfigFrom(__DIR__.'/../../../../config/bradmin.php', 'bradmin');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'brainorPay');
        $this->publishes([__DIR__.'/../resources/views' => resource_path('views/bradmin/brainorPay')]);
        $this->loadMigrationsFrom(__DIR__.'/../Migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Payment', Payment::class);
        $this->app->bind('GetData', GetData::class);
    }
}