<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    protected $table = 'values';

    protected $fillable = [
        'value', 'attribute_id',
    ];


    public function attribute()
    {
        return $this->belongsTo('App\Models\Attribute', 'attribute_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'value_product', 'value_id', 'product_id');
    }
}
