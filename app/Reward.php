<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = [
        'shop_id','reward_name','points','description'
    ];
    protected $hidden = [
        'id','shop_id','created_at', 'updated_at'
    ];
}
