<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    //RELACIONAMENTO TODOS OS ITEM DO PEDIDO
    public function items()
    {
        return $this->hasMany('CodeCommerce\OrderItem');
    }

    //RELACIONAMENTO USUARIO DO PEDIDO
    public function user()
    {
        return $this->belongsTo('CodeCommerce\User');
    }
}
