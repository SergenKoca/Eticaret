<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class FavoriteProducts extends Model
{
    protected $table="favorite_products";
    public $timestamps=true;
    protected $fillable=[
        'user_id',
        'product_id',
    ];
}
