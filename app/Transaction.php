<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id','shop_id','points','spend_on_reward','added_on'
    ];
    protected $hidden = [
        'id'
    ];

    public $timestamps = false;
}
