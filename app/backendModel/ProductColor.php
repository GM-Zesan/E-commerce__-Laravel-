<?php

namespace App\backendModel;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    public function color()
    {
        return $this->belongsTo(Color::class,'colors_id','id');
    }
}
