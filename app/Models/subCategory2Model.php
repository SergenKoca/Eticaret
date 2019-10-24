<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subCategory2Model extends Model
{
    protected $table="sub_category_2";
    public $timestamps=true;

    protected $fillable=[
        "menu_id",
        "title",
        "order",
    ];

    public function product_category(){
        return $this->hasMany('productCategoryModel','sub_category_2_id','id');
    }
}
