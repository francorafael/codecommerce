<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'featured',
        'recommend'];

    public function images() {
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    public function getTagListAttribute()
    {
        $tags = $this->tags->lists('name')->toArray();
        return implode(',', $tags);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured','=','Yes');
    }

    public function scopeRecommend($query)
    {
        return $query->where('recommend','=','Yes');
    }

    public function scopeListagem($query, $id)
    {
        return $query->where('category_id','=',$id);
    }








}
