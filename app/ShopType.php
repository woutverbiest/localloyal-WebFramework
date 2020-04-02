<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopType extends Model
{
    protected $fillable = [
        'type'
    ];
    protected $table = 'shoptypes';
    public $timestamps = false;
}
