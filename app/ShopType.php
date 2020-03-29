<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopType extends Model
{
    protected $fillable = [
        'type'
    ];
    protected $hidden = [
        'id'
    ];
    protected $table = 'shoptypes';
    public $timestamps = false;
}
