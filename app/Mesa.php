<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    //
    public function details(){
        return $this->hasMany(MesaDetail::class);
    }
}
