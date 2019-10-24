<?php

namespace App\Models\BuyProduct;

use Illuminate\Database\Eloquent\Model;

class BuyProductPropertyModel extends Model
{
    protected $table="buy_product_property_v2";
    public $timestamps=true;
    protected $fillable = [
        'user_id',
       'buy_product_id',
       'main_property_id',
       'sub_property_id',
    ];
}
