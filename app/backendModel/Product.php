<?php

namespace App\backendModel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo(Category::class, 'categories_id','id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class, 'brands_id','id');
    }
}
