<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use Sortable;

    protected $table = 'products';
    const AVAILABLE = 'available';
    const UNAVAILABLE = 'unavailable';

    protected $fillable = [
        'product_code', 'name', 'price', 'info', 'description', 'img', 'status', 'category_id',
    ];

    public $sortable = [
        'id', 'product_code', 'name', 'price', 'status', 'category_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function values()
    {
        return $this->belongsToMany('App\Models\Value', 'value_product', 'product_id', 'value_id');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'product_order', 'product_id', 'order_id')->withPivot('quantity');
    }
}
