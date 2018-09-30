<?php

Route::post('/'.config('bradmin.admin_url').'/pay/banks', [
    'as'   => 'bradmin.pay.banks.display',
    'uses' => 'Bradmin\Plugins\BrainorPay\Controllers\BrainorPayController@displayBanks',
]);
