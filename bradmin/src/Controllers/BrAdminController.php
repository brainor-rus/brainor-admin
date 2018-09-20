<?php

namespace Bradmin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BrAdminController extends Controller
{

    public function getIndex()
    {
        return view('bradmin::spa');
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

    public function getDisplay()
    {

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
}
