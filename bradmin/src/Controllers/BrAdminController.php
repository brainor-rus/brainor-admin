<?php

namespace Bradmin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

use Bradmin\Section;
use Bradmin\Navigation\NavigationManager;

class BrAdminController extends Controller
{

    public function getIndex()
    {
        return view('bradmin::spa');
    }

    public function getDashboard()
    {
        return response()->json([
                'html' => View::make('bradmin::dashboard')->render(),
                'meta' => [
                    'title' => 'Главная'
                ]
            ]
        );
    }

    public function getSidebarMenu(\Illuminate\Contracts\Foundation\Application  $app)
    {
        $navigation = NavigationManager::returnNavigation($app);

        return response()->json($navigation);
    }

    public function getDisplay(Section $section, $sectionName)
    {

        $display = $section->fireDisplay($sectionName);

        return $this->render($display->render($sectionName));
    }

    public function getCreate()
    {
        return response()->json([
                'html' => View::make('bradmin::dashboard')->render(),
                'meta' => [
                    'title' => 'Главная'
                ]
            ]
        );
    }

    public function getEdit()
    {

    }

    public function postEdit()
    {

    }

    public function deleteDelete()
    {

    }

    public function render($content)
    {
        return response()->json([
                'html' => View::make('bradmin::content.general')->with(compact('content'))->render(),
                'meta' => [
                    'title' => 'Тут будет заголовок'
                ]
            ]
        );
    }
}
