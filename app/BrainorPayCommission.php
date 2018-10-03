<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrainorPayCommission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_id', 'value', 'min_value', 'created_at', 'updated_at',
    ];

    public function brainorPayBank()
    {
        return $this->hasOne(BrainorPayBank::class, 'id', 'bank_id');
    }
}
