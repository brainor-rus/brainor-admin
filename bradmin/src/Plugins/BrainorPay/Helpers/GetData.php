<?php

namespace Bradmin\Plugins\BrainorPay\Helpers;

use Illuminate\Support\Facades\DB;

class GetData
{
//    $args = [
//        'table' => 'tableName',
//        'where' => [['field1, $param],['field2', $param2]]
//    ]
    public static function getPaymentData($args){

        $paymentData = DB::table($args['table']);

        if(isset($args['where'])){
            $paymentData = $paymentData->where($args['where']);
        }

        $paymentData = $paymentData->get();

        return $paymentData;
    }
}


