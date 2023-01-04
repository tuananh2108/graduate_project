<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Construction extends Model
{
    use Sortable;

    protected $table = 'constructions';
    public $timestamps = false;

    protected $fillable = [
        'name', 'detail', 'img',
    ];

    public $sortable = [
        'id', 'name',
    ];
}
