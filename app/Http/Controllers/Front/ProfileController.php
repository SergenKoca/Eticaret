<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use App\Models\mainCategoryModel;
use App\Models\Product\Basket;
use App\Models\Product\FavoriteProducts;
use App\Models\Product\Productv2;
use App\Models\subCategory1Model;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class ProfileController extends Controller
{
    public function index(){
        $user = auth()->user();
        // menüleri getir
        $mainCategories = mainCategoryModel::all();
        $sub1Categories = subCategory1Model::all();
        View::share('mainCategories',$mainCategories);
        View::share('sub1Categories',$sub1Categories);

        // favori ürünleri getir.
        $favoriProducts = FavoriteProducts::where('user_id',$user->id)->get();
        $products = array();
        if($favoriProducts==null){
            $products = "-";
        }
        else{
            foreach ($favoriProducts as $key=> $item){
                $products[$key] = Productv2::find($item->product_id);
            }
        }
        View::share('products',$products);

        // iletişim bilgilerini getir.
        $user = auth()->user();
        $contactInfo=ContactInfo::where('user_id',$user->id)->first();
        if($contactInfo == null){
            $contactInfo = "-";
        }
        View::share('contactInfo',$contactInfo);

        // sepetteki ürün sayısını getir.
        $basket = Basket::where('user_id',auth()->user()->id)->get();
        $basketProductCount = 0;
        if($basket != null){
            $basketProductCount = count($basket);
        }
        View::share('basketProductCount',$basketProductCount);

        return view('Front.User.user_profile');
    }
    public function deleteFavoriteProduct(Request $request){
        $user = auth()->user();
        $favoriteProduct = FavoriteProducts::where('user_id',$user->id)->where('product_id',$request->product_id)->first();
        $favoriteProduct->delete();
        return back();
    }
    public function updatePassword(Request $request){
        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($request->input('password'));
        $user->save();

      return back();
    }

}
