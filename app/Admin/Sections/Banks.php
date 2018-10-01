<?php

namespace App\Admin\Sections;

use Bradmin\Section;
use Bradmin\SectionBuilder\Display\BaseDisplay\Display;
use Bradmin\SectionBuilder\Display\Table\Columns\BaseColumn\Column;
use Bradmin\SectionBuilder\Display\Table\DisplayTable;

class Banks extends Section
{
    protected $title = 'Банки';

    public static function onDisplay(){

        dd(self::title);
        $display = Display::table([
            Column::text('name', 'Имя'),
            Column::text('bik', 'БИК'),
        ])->setPagination(2);

        return $display;
    }
}