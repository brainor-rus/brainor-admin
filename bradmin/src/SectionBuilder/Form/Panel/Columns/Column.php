<?php
/**
 * Created by PhpStorm.
 * User: Артем
 * Date: 02.10.2018
 * Time: 13:44
 */

namespace Bradmin\SectionBuilder\Form\Panel\Columns;


class Column
{
    private $class, $fields;

    public function __construct($fields, $class)
    {
        $this->setFields($fields);
        $this->setClass($class);
    }

    /**
     * @param mixed $class
     */
    public function setClass($class): void
    {
        $this->class = $class;
    }

    /**
     * @param mixed $fields
     */
    public function setFields($fields): void
    {
        $this->fields = $fields;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @return mixed
     */
    public function getFields()
    {
        return $this->fields;
    }

    public function render()
    {
        return View::make('bradmin::SectionBuilder/Form/Panel/panel')->with(compact('data', 'columns', 'fields'));
    }
}