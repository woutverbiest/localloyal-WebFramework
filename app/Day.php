<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = [
        'day'
    ];
    protected $hidden = [
        'id'
    ];
    public $timestamps = false;
}
