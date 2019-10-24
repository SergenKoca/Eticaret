<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product\FavoriteProducts;
use Illuminate\Http\Request;

class FavoriteProductController extends Controller
{
    public function create(Request $request)
    {
        $user = auth()->user();
        $favoriteProduct = FavoriteProducts::



        where('user_id', $user->id)->where('product_id', $request->product_id)->first();
        if ($favoriteProduct == null) {


            $favoriteProduct = new FavoriteProducts();
            $favoriteProduct->user_id = $user->id;
            $favoriteProduct->product_id = $request->product_id;
             $favoriteProduct->save();
         } else {
            $favoriteProduct->delete();
        }
    }
}
