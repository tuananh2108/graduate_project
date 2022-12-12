<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $table = 'variant';
    public $timestamps = false;

    protected $fillable = [
        'price', 'product_id',
    ];

    public function values()
    {
        return $this->belongsToMany('App\Models\Value', 'variant_value', 'variant_id', 'value_id');
    }
}
