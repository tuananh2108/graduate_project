<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    public $timestamps = false;

    protected $fillable = [
        'name', 'detail', 'img',
    ];
}
