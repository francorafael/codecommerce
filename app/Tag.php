<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = [
        'product_id',
        'name',
        'tag_id'

    ];

    public function products()
    {
        return $this->belongsToMany('CodeCommerce\Product');
    }
}
