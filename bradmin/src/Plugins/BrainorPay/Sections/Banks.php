<?php

namespace Bradmin\Plugins\BrainorPay\Sections;

use Bradmin\Section;
use Bradmin\SectionBuilder\Display\BaseDisplay\Display;
use Bradmin\SectionBuilder\Display\Table\Columns\BaseColumn\Column;
use Bradmin\SectionBuilder\Display\Table\DisplayTable;

class Banks extends Section
{
    public static function onDisplay(){

        $display = Display::table([
            Column::text('id', '#'),
        ])->setPagination(2);

        return $display;
    }
}