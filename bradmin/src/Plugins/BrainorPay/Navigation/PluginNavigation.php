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
                        'url' => '/bradmin/BrainorPayBanks',
                        'icon' => 'fas fa-address-book',
                        'text' => 'Банки'
                    ],
                    [
                        'url' => '/bradmin/BrainorPayBankResponses',
                        'icon' => 'fas fa-address-book',
                        'text' => 'Ответы банков'
                    ],
                    [
                        'url' => '/bradmin/BrainorPayCommissions',
                        'icon' => 'fas fa-address-book',
                        'text' => 'Коммиссии банков'
                    ],
                    [
                        'url' => '/bradmin/BrainorPayStatistics',
                        'icon' => 'fas fa-address-book',
                        'text' => 'Статистика'
                    ],
                    [
                        'url' => '/bradmin/BrainorPayStatisticParts',
                        'icon' => 'fas fa-address-book',
                        'text' => 'Статистика (доп)'
                    ]
                ]
            ]
        ];
    }

    public static function getPluginNav(){
        return (new self)->pluginNav;
    }

}