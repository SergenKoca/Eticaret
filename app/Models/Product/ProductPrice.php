<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $table="_product_price";
    public $timestamps=true;
    protected $fillable=[
      'product_id',
      'price',
    ];
}
