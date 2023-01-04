<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class News extends Model
{
    use Sortable;

    protected $table = 'news';
    public $timestamps = false;
    const SHOW = 'show';
    const HIDDEN = 'hidden';

    protected $fillable = [
        'title', 'content', 'img', 'status',
    ];

    public $sortable = [
        'id', 'title',
    ];
}
