<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //    $category->products()

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage = $this->image;
        if ($featuredImage)
        {
            return '/images/categories/'.$this->image;
        }
        return '/images/products/default.jpg';
    }
    
}
