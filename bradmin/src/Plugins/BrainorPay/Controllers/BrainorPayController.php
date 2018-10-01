<?php

namespace Bradmin\Plugins\BrainorPay\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

use Bradmin\Plugins\BrainorPay\Models\BrainorPayBank;
use Bradmin\Plugins\BrainorPay\Helpers\GetData;

class BrainorPayController extends Controller
{
    public function displayBanks()
    {

//        $banks = GetData::getPaymentData([
//            'table' => 'brainor_pay_banks',
//            'where' => function($query) {
//                $query->where('bik', 1);
//            }
//        ]);

        $banksData = new GetData('brainor_pay_banks',  function($query) {
            $query->where('bik', 1);
        });
        $banks = $banksData->get();

        return response()->json([
                'html' => View::make('brainorPay::admin.banks.display')->with(compact('banks'))->render(),
                'meta' => [
                    'title' => 'Банки'
                ]
            ]
        );
    }
}
