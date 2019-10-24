<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table="product_category";
    public $timestamps=true;
    protected $fillable=[
        'product_id',
        'main_category_id',
        'sub_category_1_id',
        'sub_category_2_id'
    ];

    public function products()
    {
        return $this->hasMany(Productv2::class, 'product_id');
    }
}
