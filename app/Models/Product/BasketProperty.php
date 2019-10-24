<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class BasketProperty extends Model
{
    protected $table="basket_property_v2";
    public $timestamps=true;
    protected $fillable=[
        'user_id',
        'basket_id',
        'main_property_id',
        'sub_property_id',
    ];
}
