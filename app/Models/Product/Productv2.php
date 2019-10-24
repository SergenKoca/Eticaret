<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Productv2 extends Model
{
    protected $table="productv2";
    public $timestamps=true;
    protected $fillable=[
        'title',
        'img_url',
    ];

    public function product_property(){
        return $this->hasMany('productPropertyModel','product_id','id');
    }

    public function product_category(){
        return $this->hasMany('productCategoryModel','product_id','id');
    }

}
