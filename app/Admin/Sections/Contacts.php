<?php

namespace App\Admin\Sections;

use Bradmin\Section;

class Contacts extends Section
{
    public static function onDisplay(){
        $contacts = [
            [
                'name' => 'Антон',
                'address' => 'г.Москва, ул. Уличная, д. 1',
                'tels' => ['+7(111)111-11-11','+7(111)222-22-22','+7(111)222-22-22'],
                'email' => 'anton@mail.ru'
            ],
            [
                'name' => 'Вася',
                'address' => 'г.Москва, ул. Уличная, д. 2',
                'tels' => ['+7(112)111-11-11','+7(112)222-22-22','+7(112)222-22-22'],
                'email' => 'vasia@mail.ru'
            ],
            [
                'name' => 'Толик',
                'address' => 'г.Москва, ул. Уличная, д. 3',
                'tels' => ['+7(113)111-11-11','+7(113)222-22-22','+7(113)222-22-22'],
                'email' => 'tolik@mail.ru'
            ],
        ];

        return $contacts;
    }
}