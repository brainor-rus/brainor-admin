<?php

namespace Bradmin\Navigation;

use Bradmin\Providers\BrAdminServiceProvider;
use Bradmin\Plugins\PluginManager;

class NavigationManager
{
    protected $navigation = null;
    protected $allPluginsNavigation = [];

    public function __construct(\Illuminate\Contracts\Foundation\Application  $app=null)
    {
            $this->navigation = $this->getDefaultNavigation();
        $this->allPluginsNavigation;
        $this->app = $app;
    }

    public function getDefaultNavigation()
    {
        $navigation = NavigationDefault::getNavigationList();

        return $navigation;
    }

    public function getNavigation()
    {
        $navigation = $this->navigation;
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

                $pluginNavigation = $this->app->{$pluginProvider['nameSpace'].'\\'.$pluginProvider['class']}->navigation;
                $this->allPluginsNavigation = array_merge($this->allPluginsNavigation,$pluginNavigation);
            }
        }
        return array_merge($navigation,$this->allPluginsNavigation);
    }

    public static function returnNavigation(\Illuminate\Contracts\Foundation\Application  $app)
    {
        $navigation = (new self($app))->getNavigation();

        return $navigation;
    }

}