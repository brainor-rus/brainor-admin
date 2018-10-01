<?php

namespace Bradmin\Plugins\BrainorCms\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

use Bradmin\Section;
use Bradmin\Navigation\NavigationManager;

class BrainorCmsController extends Controller
{
    public function displayPages()
    {
        return response()->json([
                'html' => View::make('brainor_cms::pages')->render(),
                'meta' => [
                    'title' => 'Страницы'
                ]
            ]
        );
    }
}
