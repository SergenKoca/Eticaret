<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mainPropertyModel extends Model
{
    protected $table="main_property";
    public $timestamps=true;
    protected $fillable=[
        'title',
        'order',
    ];

    public function sub_property(){
        return $this->hasMany('subPropertyModel','main_property_id','id');
    }

    public function product_property(){
        return $this->hasMany('productPropertyModel','main_property_id','id');
    }
}
