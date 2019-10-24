<?php

namespace App\Models\BuyProduct;

use Illuminate\Database\Eloquent\Model;

class TopSellingModel extends Model
{
    protected $table="top_selling_products";
    public $timestamps=true;
    protected $fillable=[
      'product_id',
      'sell_count'
    ];
}
