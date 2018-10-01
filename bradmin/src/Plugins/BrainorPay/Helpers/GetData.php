<?php

namespace Bradmin\Plugins\BrainorPay\Helpers;

use Illuminate\Support\Facades\DB;

class GetData
{
    private $table, $query;

    public function __construct($table = null, $query = null)
    {
        $this->table($table);
        $this->setQuery($query);
    }

    public function table($table)
    {
        $this->table = $table;
    }

    private function setQuery($query)
    {
        $this->query = $query;
    }

    public function get()
    {
        return DB::table($this->table)
            ->when(isset($this->query), $this->query)
            ->get();
    }

    public function first()
    {
        return DB::table($this->table)
            ->when(isset($this->query), $this->query)
            ->first();
    }

}


