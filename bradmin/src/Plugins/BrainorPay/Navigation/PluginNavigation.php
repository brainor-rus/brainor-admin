<?php

namespace Bradmin\Plugins\BrainorPay\Navigation;

class PluginNavigation
{

    private $pluginNav;

    public function __construct()
    {
        $this->pluginNav = [
            [
                'url' => '/'.config('bradmin.admin_url').'/pay',
                'icon' => 'fas fa-users',
                'text' => 'Оплата',
                'nodes' => [
                    [
                        'url' => '/'.config('bradmin.admin_url').'/pay/banks',
                        'icon' => 'fas fa-users',
                        'text' => 'Банки',
                    ],
                    [
                        'url' => '/'.config('bradmin.admin_url').'/pay/comission',
                        'icon' => 'fas fa-users',
                        'text' => 'Комиссии',
                    ],
                ]
            ]
        ];
    }

    public static function getPluginNav(){
        return (new self)->pluginNav;
    }

}