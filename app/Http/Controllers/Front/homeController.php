<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BuyProduct\TopSellingModel;
use App\Models\mainCategoryModel;
use App\Models\Product\Basket;
use App\Models\Product\LatestProduct;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductPrice;
use App\Models\Product\Productv2;
use App\Models\subCategory1Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class homeController extends Controller
{
    public function index(){
        $user = auth()->user();
        if($user!=null){
            if($user->role != 0 && $user->role != 1){
                return view('admin.main');
            }
            $mainCategories = mainCategoryModel::all();
            $sub1Categories = subCategory1Model::all();
            View::share('mainCategories',$mainCategories);
            View::share('sub1Categories',$sub1Categories);

            // get latest product : last 5 product
            $latestProduct = LatestProduct::where('user_id',$user->id)->get();
            if(count($latestProduct) > 5){
                $i=0;
                $reversed=$latestProduct->reverse();
                $datas = array();
                foreach ($reversed as $key=> $item) {
                    if($i>5){
                        return;
                    }
                    $datas[$key] = Productv2::find($item->product_id);
                    $i++;
                }

                View::share('latestProducts',$datas);
                // fiyatları al.
                $productPrice = array();
                foreach ($datas as $key => $product){
                    $productPrice[$key] = ProductPrice::where('product_id',$product->id)->select('price')->first();
                    if($productPrice[$key]==null){
                        $productPrice[$key]="-";
                    }
                    else{
                        $productPrice[$key]=$productPrice[$key]->price;
                    }
                }
                View::share('productPrices',$productPrice);

            }
            else if(count($latestProduct)>=1 && count($latestProduct) <=5){
                $datas = array();
                foreach ($latestProduct as $key=> $item) {
                    $datas[$key] = Productv2::find($item->product_id);
                }
                View::share('latestProducts',$datas);

                $productPrice = array();
                foreach ($datas as $key => $product){
                    $productPrice[$key] = ProductPrice::where('product_id',$product->id)->select('price')->first();
                    if($productPrice[$key]==null){
                        $productPrice[$key]="-";
                    }
                    else{
                        $productPrice[$key]=$productPrice[$key]->price;
                    }
                }
                View::share('productPrices',$productPrice);
            }

            // en çok satılan 10 ürünü getir
            $topSellingProductTable = TopSellingModel::orderBy('sell_count','asc')->take(10)->get();
            $topSellingProducts=array();
            $topSellingProductsPrices = array();
            foreach ($topSellingProductTable as $key=> $item){
                $topSellingProducts[$key] = Productv2::find($item->product_id);
                $topSellingProductsPrices[$key] = ProductPrice::where('product_id',$item->product_id)->first();
            }
            View::share('topSellingProducts',$topSellingProducts);
            View::share('topSellingProductsPrices',$topSellingProductsPrices);

           // sepetteki ürün sayısını getir.
            $basket = Basket::where('user_id',auth()->user()->id)->get();
            $basketProductCount = 0;
            if($basket != null){
                $basketProductCount = count($basket);
            }
            View::share('basketProductCount',$basketProductCount);

            return view('Front.home');
        }
        else{
            $mainCategories = mainCategoryModel::all();
            $sub1Categories = subCategory1Model::all();
            View::share('mainCategories',$mainCategories);
            View::share('sub1Categories',$sub1Categories);

            $topSellingProductTable = TopSellingModel::orderBy('sell_count','asc')->take(10)->get();
            $topSellingProducts=array();
            $topSellingProductsPrices = array();
            foreach ($topSellingProductTable as $key=> $item){
                $topSellingProducts[$key] = Productv2::find($item->product_id);
                $topSellingProductsPrices[$key] = ProductPrice::where('product_id',$item->product_id)->first();
            }
            View::share('topSellingProducts',$topSellingProducts);
            View::share('topSellingProductsPrices',$topSellingProductsPrices);

            return view('Front.home');
        }
    }

    public function productDetail(Request $request){
        $productCategory=ProductCategory::where('product_id',$request->id)->first();

        $mainCategory =$productCategory->main_category_id;
        $sub_category_1_id = $productCategory->sub_category_1_id;
        $sub_category_2_id = $productCategory->sub_category_2_id;

        return redirect()->route('name.front.productDetail.index',['id'=>$request->id,'price'=>$request->price,'main_category_id'=>$mainCategory,
                                'sub_category_1_id'=>$sub_category_1_id,'sub_category_2_id'=>$sub_category_2_id]);
    }

}
