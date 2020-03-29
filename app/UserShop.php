<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserShop extends Model
{
    protected $fillable = [
        'user_id','shop_id','points','favorite'
    ];
    protected $hidden = [
        'user_id', 'created_at','updated_at'
    ];

    protected $table = 'usershop';
}
