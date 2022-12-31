<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Construction extends Model
{
    protected $table = 'constructions';
    public $timestamps = false;

    protected $fillable = [
        'name', 'detail', 'img',
    ];
}
