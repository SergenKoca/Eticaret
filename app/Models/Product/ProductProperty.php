<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    protected $table="product_property";
    public $timestamps=true;
    protected $fillable=[
        'product_id',
        'main_property_id',
        'sub_property_id',
    ];
}
