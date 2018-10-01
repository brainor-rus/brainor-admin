<?php

namespace App\Admin\Sections;

use Bradmin\Section;

class Users  extends Section
{
    public static function onDisplay(){
        $users = [
            [
                'name' => 'Антон',
                'email' => 'anton@mail.ru'
            ],
            [
                'name' => 'Вася',
                'email' => 'vasia@mail.ru'
            ],
            [
                'name' => 'Толик',
                'email' => 'tolik@mail.ru'
            ],
        ];

        return $users;
    }
}