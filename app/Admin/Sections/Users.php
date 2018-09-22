<?php

namespace App\Admin\Sections;

class Users
{
    public function onDisplay(){
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
    }
}