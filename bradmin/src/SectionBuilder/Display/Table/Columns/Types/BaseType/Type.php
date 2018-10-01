<?php
/**
 * Created by PhpStorm.
 * User: Артем
 * Date: 01.10.2018
 * Time: 13:30
 */

namespace Bradmin\SectionBuilder\Display\Table\Columns\Types\BaseType;


abstract class Type
{
    private $label, $name;

    public function __construct($name, $label)
    {
        $this->setLabel($label);
        $this->setName($name);
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label): void
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public abstract function render($value);
}