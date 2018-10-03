<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrainorPayBank extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'bik', 'created_at', 'updated_at',
    ];
}
