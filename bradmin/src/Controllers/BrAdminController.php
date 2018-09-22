<?php

namespace Bradmin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

use Bradmin\Section;

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

    public function getSidebarMenu()
    {
        $response = [
            'meta' =>[
                'title' => 'Пользователи'
            ],
            'data' =>[
                [
                    'url' => '/bradmin/users',
                    'icon' => 'fas fa-users',
                    'text' => 'Пользователи'
                ],
                [
                    'url' => '/bradmin/contacts',
                    'icon' => 'fas fa-address-book',
                    'text' => 'Контакты'
                ]
            ]
        ];

        return response()->json($response);
    }

    public function getDisplay(Section $section, $sectionName)
    {

        $display = $section->fireDisplay($sectionName);

        return $this->render($display);
    }

    public function getCreate()
    {

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
