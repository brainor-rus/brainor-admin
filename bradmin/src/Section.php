<?php

namespace Bradmin;


class Section
{
    private $class;

    public function __construct(\Illuminate\Contracts\Foundation\Application $app)
    {
        $this->app = $app;
    }

    public function fireDisplay($sectionName,array $payload = [])
    {

//        if (! method_exists($this, 'onDisplay')) {
//            return;
//        }
        $this->setClass(config('bradmin.user_path').'\\Sections\\'.$sectionName);

        $display = $this->app->call([$this->getClass(), 'onDisplay'], $payload);

        return $display;
    }

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
}