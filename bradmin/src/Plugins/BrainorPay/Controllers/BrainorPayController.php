<?php

namespace Bradmin\Plugins\BrainorPay\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

use Bradmin\Plugins\BrainorPay\Models\BrainorPayBank;

class BrainorPayController extends Controller
{
    public function displayBanks()
    {
        $banks = BrainorPayBank::all();
        return response()->json([
                'html' => View::make('brainorPay::admin.banks.display')->with(compact('banks'))->render(),
                'meta' => [
                    'title' => 'Страницы'
                ]
            ]
        );
    }
}
