<?php

namespace App\Admin\Sections;

use Bradmin\Section;
use Bradmin\SectionBuilder\Display\BaseDisplay\Display;
use Bradmin\SectionBuilder\Display\Table\Columns\BaseColumn\Column;
use Bradmin\SectionBuilder\Display\Table\DisplayTable;

class Banks extends Section
{
    protected $title = 'Банки';
    protected $model = '/bradmin/src/Plugins/BrainorPay/Models/BrainorPayBank';

    public static function onDisplay(){

        $display = Display::table([
            Column::text('name', 'Имя'),
            Column::text('bik', 'БИК'),
        ])->setPagination(2);

        return $display;
    }
}