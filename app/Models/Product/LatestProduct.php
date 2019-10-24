<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class LatestProduct extends Model
{
    protected $table="latest_product";
    public $timestamps=true;
    protected $fillable=[
      'user_id',
      'product_id',
    ];
}
