<?php
/**
 * Created by PhpStorm.
 * User: Артем
 * Date: 01.10.2018
 * Time: 13:15
 */

namespace Bradmin\SectionBuilder\Display\BaseDisplay;


use Bradmin\SectionBuilder\Display\Table\DisplayTable;

class Display
{
    public static function table($columns = null, $pagination = null)
    {
        return new DisplayTable($columns ?? null, $pagination ?? 15);
    }
}