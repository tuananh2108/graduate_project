<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Project extends Model
{
    use Sortable;

    protected $table = 'projects';
    public $timestamps = false;

    protected $fillable = [
        'name', 'detail', 'img',
    ];

    public $sortable = [
        'id', 'name',
    ];
}
