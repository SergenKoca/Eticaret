<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ViewProduct extends Model
{
    protected $table="view_product";
    public $timestamps=true;
    protected $fillable=[
        'user_id',
        'product_id',
        'view',
    ];
}
