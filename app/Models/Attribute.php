<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'attributes';

    protected $fillable = [
        'name',
    ];

    public function values()
    {
        return $this->hasMany('App\Models\Value', 'attribute_id', 'id');
    }
}
