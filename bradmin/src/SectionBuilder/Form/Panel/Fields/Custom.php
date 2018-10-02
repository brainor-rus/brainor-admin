<?php
/**
 * Created by PhpStorm.
 * User: Артем
 * Date: 02.10.2018
 * Time: 13:36
 */

namespace Bradmin\SectionBuilder\Form\Panel\Fields;

class Custom
{
    private $Html;

    public function __construct($html)
    {
        $this->setHtml($html);
    }

    /**
     * @param mixed $Html
     */
    private function setHtml($Html)
    {
        $this->Html = $Html;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHtml()
    {
        return $this->Html;
    }

    public static function getName()
    {
        return null;
    }

    public function render()
    {
        return $this->getHtml();
    }
}