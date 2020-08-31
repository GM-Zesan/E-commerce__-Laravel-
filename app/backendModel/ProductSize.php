<?php

namespace App\backendModel;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    public function size()
    {
        return $this->belongsTo(Size::class,'sizes_id','id');
    }
}
