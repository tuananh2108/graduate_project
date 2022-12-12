<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    public $timestamps = false;
    const SHOW = 'show';
    const HIDDEN = 'hidden';

    protected $fillable = [
        'title', 'content', 'img', 'status',
    ];
}
