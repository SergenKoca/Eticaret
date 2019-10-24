<?php

namespace App\Models\BuyProduct;

use Illuminate\Database\Eloquent\Model;

class BuyProductModel extends Model
{
    protected $table="buy_product";
    public $timestamps=true;
    protected $fillable=[
        'user_id',
        'product_id',
    ];

    public function buyProductProperty(){
        $this->hasMany('App\Models\BuyProduct\BuyProductPropertyModel','buy_product_id','id');
    }
}
