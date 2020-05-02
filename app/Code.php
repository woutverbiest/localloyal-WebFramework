<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $fillable = [
        'shopid','code','points','used','created_at','updated_at'
    ];
    protected $hidden = [
        'shopid','points','used','created_at','updated_at'
    ];
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType = 'string';
}
