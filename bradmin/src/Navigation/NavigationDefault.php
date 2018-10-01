<?php

namespace Bradmin\Navigation;


class NavigationDefault
{
    public static function getNavigationList()
    {
        $navigation = [
            [
                'url' => '/bradmin/users',
                'icon' => 'fas fa-users',
                'text' => 'Пользователи'
            ],
            [
                'url' => '/bradmin/contacts',
                'icon' => 'fas fa-address-book',
                'text' => 'Контакты'
            ]
        ];

        return $navigation;
    }
}