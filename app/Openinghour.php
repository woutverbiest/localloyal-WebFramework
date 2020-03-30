<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Openinghour extends Model
{
    protected $fillable = [
        'shop_id','day_id','from','till','brake_start','brake_end', 'closed'
    ];
    protected $hidden =[
        'created_at','updated_at'
    ];
}
