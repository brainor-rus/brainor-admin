<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SpaController extends Controller
{
    public function index()
    {
        return view('spa');
    }
    public function sidebarMenu()
    {
        $response = [
            'meta' =>[
                'title' => 'Пользователи'
            ],
            'data' =>[
                [
                    'url' => '/users',
                    'icon' => 'fas fa-users',
                    'text' => 'Пользователи'
                ],
                [
                    'url' => '/contacts',
                    'icon' => 'fas fa-address-book',
                    'text' => 'Контакты'
                ]
            ]
        ];

        return response()->json($response);
    }

    public function usersIndex()
    {
        $users = [
                [
                    'name' => 'Антон',
                    'email' => 'anton@mail.ru'
                ],
                [
                    'name' => 'Вася',
                    'email' => 'vasia@mail.ru'
                ],
                [
                    'name' => 'Толик',
                    'email' => 'tolik@mail.ru'
                ],
        ];

        return response()->json([
                'html' => View::make('usersIndex')->with(compact('users'))->render(),
                'meta' => [
                    'title' => 'Пользователи'
                ]
            ]
        );
    }

    public function contactsIndex()
    {
        $contacts = [
                [
                    'name' => 'Антон',
                    'address' => 'г.Москва, ул. Уличная, д. 1',
                    'tels' => ['+7(111)111-11-11','+7(111)222-22-22','+7(111)222-22-22'],
                    'email' => 'anton@mail.ru'
                ],
                [
                    'name' => 'Вася',
                    'address' => 'г.Москва, ул. Уличная, д. 2',
                    'tels' => ['+7(112)111-11-11','+7(112)222-22-22','+7(112)222-22-22'],
                    'email' => 'vasia@mail.ru'
                ],
                [
                    'name' => 'Толик',
                    'address' => 'г.Москва, ул. Уличная, д. 3',
                    'tels' => ['+7(113)111-11-11','+7(113)222-22-22','+7(113)222-22-22'],
                    'email' => 'tolik@mail.ru'
                ],
        ];
        return response()->json([
                'html' => View::make('contactsIndex')->with(compact('contacts'))->render(),
                'meta' => [
                    'title' => 'Контакты'
                ]
            ]
        );
    }
}
