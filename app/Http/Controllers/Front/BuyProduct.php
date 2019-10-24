<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BuyProduct\BuyProductModel;
use App\Models\BuyProduct\BuyProductPropertyModel;
use App\Models\BuyProduct\TopSellingModel;
use App\Models\Product\Basket;
use App\Models\Product\BasketProperty;
use App\Models\Product\Productv2;
use Illuminate\Http\Request;

class BuyProduct extends Controller
{
    public function confirmBasket(Request $request){
        $user = auth()->user();
        $basket = Basket::where('user_id',$user->id)->get();

        // satın alınan ürünleri buy_product tablosuna kaydettim.
        foreach ($basket as $item){
            $buyProduct = new BuyProductModel();
            $buyProduct->user_id = $user->id;
            $buyProduct->product_id = $item->product_id;
            $buyProduct->save();
        }
        // son satın alınan ürünlerin id'lerini aldım.
        $getedBuyProduct = BuyProductModel::orderBy('id','desc')->take(count($basket))->get();
        $buyProductIds = array();
        for($i = 0;$i<count($basket);$i++){
            $buyProductIds[$i] = $getedBuyProduct[$i]->id;
        }

        // satın alınan ürünleri buy_product_property tablosuna kaydettim.
        $basketProperties = BasketProperty::where('user_id',$user->id)->get();
        $j=0;
        for ($i=0;$i<count($basketProperties);$i++){
            $buyProductProperty = new BuyProductPropertyModel();
            $buyProductProperty->user_id = $user->id;
            if($j<count($buyProductIds)){
                $buyProductProperty->buy_product_id = $buyProductIds[$j];
                $j++;
            }
            else{
                $j = count($buyProductIds)-1;
                $buyProductProperty->buy_product_id = $buyProductIds[$j];
            }
            $buyProductProperty->main_property_id = $basketProperties[$i]->main_property_id;
            $buyProductProperty->sub_property_id = $basketProperties[$i]->sub_property_id;
            $buyProductProperty->save();
        }

        // top-selling-product tablosuna eklemem lazım.
        foreach ($basket as $item){
            $topSellingProduct=TopSellingModel::where('product_id',$item->product_id)->first();
            if($topSellingProduct == null){
                $topSellingProduct = new TopSellingModel();
                $topSellingProduct->product_id = $item->product_id;
                $topSellingProduct->sell_count = 1;
                $topSellingProduct->save();
            }
            else{
                $topSellingProduct->sell_count++;
                $topSellingProduct->save();
            }
        }

        //basket ve basket_property tablosunu boşaltmam lazım.
        Basket::truncate();
        BasketProperty::truncate();

    }
}
