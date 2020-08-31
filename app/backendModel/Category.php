<?php

namespace App\backendModel;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'categories_name', 'categories_slug',
    ];
}
