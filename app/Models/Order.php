<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Order extends Model
{
    use Sortable;

    protected $table = 'orders';
    public $timestamps = false;
    const PENDING = 'pending';
    const DELIVERING = 'delivering';
    const DELIVERED = 'delivered';
    const CANCEL = 'cancel';

    protected $fillable = [
        'status',
    ];

    protected $casts = [
        'order_date' => 'datetime',
    ];

    public $sortable = [
        'id', 'total', 'status', 'user.name'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_order', 'order_id', 'product_id')->withPivot('quantity');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
