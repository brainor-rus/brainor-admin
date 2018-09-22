<?php

namespace Bradmin;


class Section
{
    public function __construct(\Illuminate\Contracts\Foundation\Application $app)
    {
        $this->app = $app;
    }

    public function fireDisplay($sectionName,array $payload = [])
    {

//        if (! method_exists($this, 'onDisplay')) {
//            return;
//        }
        $class = config('bradmin.user_path').'\\Sections\\'.$sectionName;

        $display = $this->app->call([$class, 'onDisplay'], $payload);

        return $display;
    }
}