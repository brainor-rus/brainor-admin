<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrainorPayStatisticPart extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_id', 'pay_statistic_id', 'connection_id', 'connection_type', 'amount', 'created_at', 'updated_at'
    ];

    public function brainorPayStatistic()
    {
        return $this->hasOne(BrainorPayStatistic::class, 'id', 'pay_statistic_id');
    }
}
