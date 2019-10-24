<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mainCategoryModel extends Model
{
    protected $table="main_category";
    public $timestamps=true;
    protected $fillable=[
        'title',
        'order',
    ];

    public function subMenu1(){
        return $this->hasMany('App\Models\subCategory1Model','menu_id','id');
    }

    public function product_category(){
        return $this->hasMany('productCategoryModel','main_category_id','id');
    }
}
