<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subCategory1Model extends Model
{
    protected $table="sub_category_1";
    public $timestamps=true;
    protected $fillable=[
      "menu_id",
      "title",
      "order",
    ];

    public function sub2(){
        return $this->hasMany('App\Models\subCategory2Model','menu_id','id');
    }

    public function product_category(){
        return $this->hasMany('productCategoryModel','sub_category_1_id','id');
    }
}
