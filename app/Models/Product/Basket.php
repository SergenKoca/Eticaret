<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $table="basket";
    public $timestamps=true;
    protected $fillable=[
        'user_id',
        'product_id',
    ];

    public function basketProperty(){
        return $this->hasMany('App\Models\Product\BasketProperty','basket_id','id');
    }
}
