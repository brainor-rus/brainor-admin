<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrainorPayStatistic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_id', 'user_id', 'connection_id', 'connection_type', 'amount', 'commission', 'bank_status_id', 'bank_status_mes', 'created_at', 'updated_at'
    ];

    public function brainorPayBank()
    {
        return $this->hasOne(BrainorPayBank::class, 'id', 'bank_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
