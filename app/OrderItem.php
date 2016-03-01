<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    // FORCA A TABLE QUE VAI SER REFERENCIADA
    protected $table = 'order_items';

    protected $fillable = [
        'product_id',
        'price',
        'qtd'
    ];

    // 1 ITEM TEM UMA ORDER
    public function order()
    {
        return $this->belongsTo('CodeCommerce\Order');
    }
}
