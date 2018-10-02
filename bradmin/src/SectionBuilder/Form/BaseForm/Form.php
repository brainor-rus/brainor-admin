<?php
/**
 * Created by PhpStorm.
 * User: Артем
 * Date: 02.10.2018
 * Time: 13:00
 */

namespace Bradmin\SectionBuilder\Form\BaseForm;


use Bradmin\SectionBuilder\Form\Panel\PanelForm;

class Form
{
    public static function panel($columns)
    {
        return new PanelForm($columns);
    }
}