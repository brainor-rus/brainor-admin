<?php

namespace App\Admin\Sections;

use Bradmin\Section;
use Bradmin\SectionBuilder\Display\BaseDisplay\Display;
use Bradmin\SectionBuilder\Display\Table\Columns\BaseColumn\Column;
use Bradmin\SectionBuilder\Display\Table\DisplayTable;
use Illuminate\Support\Facades\Request;

class Users extends Section
{
    protected $title = 'Пользователи';
    protected $model = '\App\User';

    public static function onDisplay(Request $request){

        $display = Display::table([
            Column::text('name', 'Имя'),
            Column::text('email', 'Email'),
//            Column::text('contact.value', 'Контакты'),
//            Column::text('roles.name', 'Роли'),
        ])->setPagination(1);

        return $display;
    }
}