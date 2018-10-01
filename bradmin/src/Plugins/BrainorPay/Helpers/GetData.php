<?php

namespace Bradmin\Plugins\BrainorPay\Helpers;

use Illuminate\Support\Facades\DB;

class GetData
{
    private $table, $query;

    public function __construct($table, $query = null)
    {
        $this->setTable($table);
        $this->setQuery($query);
    }

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

    public function setTable($table)
    {
        $this->table = $table;
    }

    private function setQuery($query)
    {
        $this->query = $query;
    }

    public function get()
    {
        return DB::table($this->table)->when(
            isset($this->query),
            $this->query
        )->get();
    }

    public function first()
    {
        return DB::table($this->table)->when(
            isset($this->query),
            $this->query
        )->first();
    }

}


