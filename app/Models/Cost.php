<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $table = 'costs';
    public $timestamps = false;

    protected $fillable = [
        'detail', 'img',
    ];
}
