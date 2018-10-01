<?php

namespace App\Admin\Sections;

use Bradmin\Section;
use Bradmin\SectionBuilder\Display\BaseDisplay\Display;
use Bradmin\SectionBuilder\Display\Table\Columns\BaseColumn\Column;
use Bradmin\SectionBuilder\Display\Table\DisplayTable;

class Users extends Section
{
    public static function onDisplay(){

        $display = Display::table([
            Column::text('name', 'Имя'),
            Column::text('email', 'Email'),
            Column::text('contact.value', 'Контакты'),
            Column::text('roles.name', 'Роли'),
        ])->setPagination(2);

        return $display;
    }
}