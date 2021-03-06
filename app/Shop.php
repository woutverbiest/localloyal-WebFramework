<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'shopname',
        'shoptype',
        'description',
        'visible', 
        'user_id', 
        'phonenumber',
        'street',
        'city',
        'number',
        'country',
        'pincode',
        'longitude',
        'longitudepos',
        'latitude',
        'latitudepos'
    ];
    protected $hidden = [
        'id','visible','created_at','updated_at','user_id'
    ];
}
