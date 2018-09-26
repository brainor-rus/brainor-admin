<?php

namespace Bradmin\Plugins\BrainorCms\Navigation;

class PluginNavigation
{

    private $pluginNav;

    public function __construct()
    {
        $this->pluginNav = [
            [
                'url' => '/'.config('bradmin.admin_url').'/cms/pages',
                'icon' => 'fas fa-users',
                'text' => 'Страницы'
            ],
            [
                'url' => '/'.config('bradmin.admin_url').'/cms/posts',
                'icon' => 'fas fa-address-book',
                'text' => 'Записи'
            ]
        ];
    }

    public static function getPluginNav(){
        return (new self)->pluginNav;
    }

}