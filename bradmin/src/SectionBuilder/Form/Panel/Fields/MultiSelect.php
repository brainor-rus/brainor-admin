<?php
/**
 * Created by PhpStorm.
 * User: Артем
 * Date: 02.10.2018
 * Time: 13:36
 */

namespace Bradmin\SectionBuilder\Form\Panel\Fields;


use Illuminate\Support\Facades\View;

class MultiSelect
{
    private $name, $label, $value, $required, $readonly, $options, $modelForOptions, $display;

    public function __construct($name, $label)
    {
        $this->setName($name);
        $this->setLabel($label);
    }

    /**
     * @param mixed $name
     */
    private function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $label
     */
    private function setLabel($label): void
    {
        $this->label = $label;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param mixed $readonly
     */
    public function setReadonly($readonly)
    {
        $this->readonly = $readonly;
        return $this;
    }

    /**
     * @param mixed $required
     */
    public function setRequired($required)
    {
        $this->required = $required;
        return $this;
    }

    /**
     * @param mixed $options
     */
    private function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @param mixed $modelForOptions
     */
    public function setModelForOptions($modelForOptions)
    {
        $this->modelForOptions = $modelForOptions;
        return $this;
    }


    /**
     * @param mixed $display
     */
    public function setDisplay($display)
    {
        $this->display = $display;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * @return mixed
     */
    public function getReadonly()
    {
        return $this->readonly;
    }

    /**
     * @return mixed
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        if(isset($this->options))
        {
            return $this->options;
        } else
        {
            if($this->getModelForOptions() !== null)
            {
                foreach ($this->getModelForOptions()::all() as $row)
                {
                    $this->options[$row->id] = $row->{$this->getDisplay()};
                }
            }

            return $this->options;
        }
    }

    /**
     * @return mixed
     */
    public function getModelForOptions()
    {
        return $this->modelForOptions;
    }

    public function render($value = null)
    {
        $name = $this->getName();
        $label = $this->getLabel();
        $required = $this->getRequired();
        $readonly = $this->getReadonly();
        $options = $this->getOptions();

        return View::make('bradmin::SectionBuilder/Form/Fields/multiselect')
            ->with(compact('name', 'label', 'value', 'required', 'readonly', 'options'));
    }
}