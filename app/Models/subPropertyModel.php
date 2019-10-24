<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subPropertyModel extends Model
{
    protected $table="sub_property";
    public $timestamps=true;
    protected $fillable=[
        'main_property_id',
        'title',
        'order',
    ];

    public function product_property(){
        return $this->hasMany('productPropertyModel','sub_property_id','id');
    }
}
