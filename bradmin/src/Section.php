<?php

namespace Bradmin;

use Illuminate\Database\Eloquent\Model;

class Section
{
    protected $model = null;
    protected $title = null;

    private $class;

    public function __construct(\Illuminate\Contracts\Foundation\Application $app)
    {
        $this->app = $app;
    }

    public function getSectionSettings($sectionName)
    {
        $section = config('bradmin.user_path').'\\Sections\\'.$sectionName;

        return get_object_vars(new $section($this->app));
    }

    public function fireDisplay($sectionName,array $payload = [])
    {

//        if (! method_exists($this, 'onDisplay')) {
//            return;
//        }
        $this->setClass(config('bradmin.user_path').'\\Sections\\'.$sectionName);

        if(!class_exists($this->getClass()))
        {
            throw new \Exception('Section not found.');
        }

        $display = $this->app->call([$this->getClass(), 'onDisplay'], $payload);

        return $display;
    }

    public function fireCreate($sectionName,array $payload = [])
    {
        $this->setClass(config('bradmin.user_path').'\\Sections\\'.$sectionName);

        if(!class_exists($this->getClass()))
        {
            throw new \Exception('Section not found.');
        }

        $display = $this->app->call([$this->getClass(), 'onCreate'], $payload);

        return $display;
    }

    public function fireEdit($sectionName,array $payload = [])
    {
        $this->setClass(config('bradmin.user_path').'\\Sections\\'.$sectionName);

        if(!class_exists($this->getClass()))
        {
            throw new \Exception('Section not found.');
        }

        $display = $this->app->call([$this->getClass(), 'onEdit'], $payload);

        return $display;
    }

    public function fireDelete($sectionName,array $payload = [])
    {
        $this->setClass(config('bradmin.user_path').'\\Sections\\'.$sectionName);

        if(!class_exists($this->getClass()))
        {
            throw new \Exception('Section not found.');
        }


        return $this->getClass();
    }

//    public function getTitle($sectionName)
//    {
//        $this->setClass(config('bradmin.user_path').'\\Sections\\'.$sectionName);
//        $title = model
//
//        return $display;
//    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class): void
    {
        $this->class = $class;
    }

    public function isCreatable()
    {
        return method_exists($this, 'onCreate') && parent::isCreatable($this->getModel());
    }

    public function isEditable(Model $model)
    {
        return method_exists($this, 'onEdit') && parent::isEditable($model);
    }

    public function isDeletable(Model $model)
    {
        return method_exists($this, 'onDelete') && parent::isDeletable($model);
    }


}