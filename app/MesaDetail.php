<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MesaDetail extends Model
{
    //
    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
