<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CategoryPropertyModel;
use App\Models\mainCategoryModel;
use App\Models\mainPropertyModel;
use App\Models\Product\Basket;
use App\Models\Product\BasketProperty;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductPrice;
use App\Models\Product\ProductProperty;
use App\Models\Product\Productv2;
use App\Models\subCategory1Model;
use App\Models\subPropertyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use SebastianBergmann\Environment\Console;

class productController extends Controller
{
    public function getProducts($main_id){
        $mainCategories = mainCategoryModel::all();
        View::share('mainCategories',$mainCategories);

        $sub1Categories = subCategory1Model::where('menu_id',$main_id)->get();

        $productCategories = ProductCategory::where('main_category_id',$main_id)->select('product_id')->get();
        $products = array();
        foreach ($productCategories as $key => $productCategory) {
            $products[$key] = Productv2::where('id',$productCategory->product_id)->firstOrFail();
        }
        $productPrice = array();
        foreach ($products as $key => $product){
            $productPrice[$key] = ProductPrice::where('product_id',$product->id)->select('price')->first();
            if($productPrice[$key]==null){
                $productPrice[$key]="-";
            }
            else{
                $productPrice[$key]=$productPrice[$key]->price;
            }
        }


        $main_category_title = mainCategoryModel::find($main_id)->title;
        //$sub2Categories = subCategory2Model::all();
        //foreign-key ile sub1 categoriye bağlı sub2 categorileri çekelim.
        /*$sub2Categories = array();
        foreach ($sub1Categories as $key => $item){
            $sub2Categories[$key] = subCategory1Model::find($item->id)->subCategory2();
        }
        dd($sub2Categories);*/

        View::share('main_category_title',$main_category_title);
        View::share('main_category_id',$main_id);
        View::share('sub1Categories',$sub1Categories);
       // View::share('sub2Categories',$sub2Categories);
        View::share('products',$products);
        View::share('productPrice',$productPrice);


        return view('Front.Product.products');

    }

    public function getSpecificProducts(Request $request){
        $productCategories = ProductCategory::where('sub_category_2_id',$request->sub2_category_id)->select('product_id')->get();
        $products = array();
        foreach ($productCategories as $key => $productCategory) {
            $products[$key] = Productv2::where('id',$productCategory->product_id)->firstOrFail();
        }
        $productPrice = array();
        foreach ($products as $key => $product){
            $productPrice[$key] = ProductPrice::where('product_id',$product->id)->select('price')->first();
            if($productPrice[$key]==null){
                $productPrice[$key]="-";
            }
            else{
                $productPrice[$key]=$productPrice[$key]->price;
            }
        }

        $categoryProduct = CategoryPropertyModel::where('main_category_id',$request->main_id)
            ->where('sub_category_1_id',$request->sub1_category_id)->where('sub_category_2_id',$request->sub2_category_id)->get();

        $mainProperties = array();
        foreach ($categoryProduct as $key => $item) {
            $mainProperties[$key] = mainPropertyModel::where('id',$item->main_property_id)->firstOrFail();
        }
        $subProperties = subPropertyModel::all();
        $mainCategories = mainCategoryModel::all();
        View::share('mainCategories',$mainCategories);

        // sepetteki ürün sayısını getir.
        $basket = Basket::where('user_id',auth()->user()->id)->get();
        $basketProductCount = 0;
        if($basket != null){
            $basketProductCount = count($basket);
        }
        View::share('basketProductCount',$basketProductCount);

        View::share('products',$products);
        View::share('productPrice',$productPrice);
        View::share('mainProperties',$mainProperties);
        View::share('subProperties',$subProperties);
        View::share('mainCategories',$mainCategories);
        View::share('main_category_id',$request->main_id);
        View::share('sub_category_1_id',$request->sub1_category_id);
        View::share('sub_category_2_id',$request->sub2_category_id);
        return view('Front.Product.getSpecificProducts');
    }

    public function addtoBasket(Request $request){
        $basket = new Basket();
        $basket->user_id = auth()->id();
        $basket->product_id = $request->product_id;

        $basket->save();

        $basketDatas = Basket::where('user_id',auth()->id())->get();
        $products[] ='';
        foreach ($basketDatas as $key =>$item){
            $products[$key] = Productv2::find($item->product_id);
        }
        View::share('products',$products);
        return redirect()->route('name_front.home');
    }

    public function getBasket(){
        $mainCategories = mainCategoryModel::all();
        View::share('mainCategories',$mainCategories); // MENÜLERİDE GETİRMEM LAZIM

        // sepetteki ürünler
        $basketDatas = Basket::where('user_id',auth()->id())->get();
        if($basketDatas->isEmpty() || $basketDatas==null){
            return view('Front.Product.EmptyBasket');
        }
        $products[] ='';
        $pricies[] = '';
        foreach ($basketDatas as $key =>$item){
            $products[$key] = Productv2::find($item->product_id);
            $pricies[$key] = ProductPrice::where('product_id',$item->product_id)->firstOrFail();
        }

        $total = 0;
        foreach ($pricies as $price){
            $total += $price->price;
        }

        // sepetteki ürünlerin seçilen özelliklerinide getirmem lazım.
        $specicifProperties = array();
        foreach ($basketDatas as $key=> $item){
            $specicifProperties[$key]=BasketProperty::where('basket_id',$item->id)->get();
        }

        $mainProperties = array();
        $subProperties = array();

        for($i=0;$i<count($specicifProperties);$i++){
            for($j=0;$j<count($specicifProperties[$i]);$j++){
                $mainProperties[$i][$j]=mainPropertyModel::find($specicifProperties[$i][$j]->main_property_id);
                $subProperties[$i][$j]=subPropertyModel::find($specicifProperties[$i][$j]->sub_property_id);
            }
        }

        View::share('products',$products);
        View::share('basketDatas',$basketDatas);
        View::share('pricies',$pricies);
        View::share('total',$total);
        View::share('specicifProperties',$specicifProperties);
        View::share('mainProperties',$mainProperties);
        View::share('subProperties',$subProperties);

        return view('Front.Product.basket');
    }

    public function deleteProduct(Request $request){
        // basket tablosundan sil
        $basketData = Basket::find($request->basket_id);
        $basketData->delete();

        // basket-properties tablosundan sil
        $basketProperty = BasketProperty::where('basket_id',$request->basket_id)->get();
        foreach ($basketProperty as $item){
            $item->delete();
        }

        return redirect()->route('name_front.get.basket');



    }

    public function getFilterProduct(Request $request){
        $subSelectedProperties= $request->input('sub_id');
        $mainProperties = array();
        foreach ($subSelectedProperties as $key => $item) {
            $mainProperties[$key]=subPropertyModel::where('id',$item)->select('main_property_id')->first();
        }


        $productCategories = ProductCategory::where('main_category_id',$request->main_category_id)->where('sub_category_1_id',$request->sub_category_1_id)
            ->where('sub_category_2_id',$request->sub_category_2_id)->get();
        foreach ($productCategories as $item) {
            if($item == null){
                return back();
            }
        }

        $productProperties = array();
        for ($i=0;$i<count($mainProperties);$i++){
            $productProperties[$i] = ProductProperty::where('main_property_id',$mainProperties[$i]->main_property_id)->where('sub_property_id',$subSelectedProperties[$i])->first();
        }
        $counter = 0;
        foreach ($productProperties as $item) {
            if($item == null){
                $counter++;
            }
            if($counter == count($productProperties)){
                return back();
            }
        }

       $findedProducts = array();
       $i =0;
        foreach ($productCategories as $pc){
            foreach ($productProperties as $pp){
                if($pp !=null){
                    if($pc->product_id == $pp->product_id){
                        $findedProducts[$i] = $pp->product_id;
                        $i++;
                    }
                }
            }
        }

        $control =null;
        $filterProducts = array();
        foreach ($findedProducts as $key=> $fp){
            for ($i=0;$i<count($mainProperties);$i++){
                $control = ProductProperty::where('product_id',$fp)->where('main_property_id',$mainProperties[$i]->main_property_id)->
                where('sub_property_id',$subSelectedProperties[$i])->get();
                if($control == null){
                    break;
                }
            }
            if($control!=null){
                $filterProducts[$key] = Productv2::find($fp);
            }
            $control = null;
        }

        $filterProductsNew = array();
        if($filterProducts == null){
            return back();
        }
        else{
            $filterProductsNew[0] = $filterProducts[0];
            $counter = 0;
            // filterelene ürünler içinden aynı ürün tekrar tekrar göstermemek için eleme yap.
            foreach ($filterProducts as $key=> $item){
                foreach ($filterProductsNew as $fpn){
                    if($fpn == $item){
                        $counter=0;
                        break;
                    }
                    else{
                        $counter++;
                    }
                }
                if($counter == count($filterProductsNew)){
                    $filterProductsNew[$key] = $item;
                    $counter = 0;
                }
            }
        }
// buraya kadar filtreli ürünler bulundu.

        $productPrice = array();
        foreach ($filterProductsNew as $key => $product){
            $productPrice[$key] = ProductPrice::where('product_id',$product->id)->select('price')->first();
            if($productPrice[$key]==null){
                $productPrice[$key]="-";
            }
            else{
                $productPrice[$key]=$productPrice[$key]->price;
            }
        }


        $categoryProduct = CategoryPropertyModel::where('main_category_id',$request->main_category_id)
            ->where('sub_category_1_id',$request->sub_category_1_id)->where('sub_category_2_id',$request->sub_category_2_id)->get();

        $mainProperties = array();
        foreach ($categoryProduct as $key => $item) {
            $mainProperties[$key] = mainPropertyModel::where('id',$item->main_property_id)->firstOrFail();
        }

        $subProperties = subPropertyModel::all();
        $mainCategories = mainCategoryModel::all();

        // sepetteki ürün sayısını getir.
        $basket = Basket::where('user_id',auth()->user()->id)->get();
        $basketProductCount = 0;
        if($basket != null){
            $basketProductCount = count($basket);
        }
        View::share('basketProductCount',$basketProductCount);

        View::share('mainCategories',$mainCategories);
        View::share('mainCategoryId',$request->main_category_id);
        View::share('sub1CategoryId',$request->sub_category_1_id);
        View::share('sub2CategoryId',$request->sub_category_2_id);

        View::share('mainProperties',$mainProperties);
        View::share('subProperties',$subProperties);
        View::share('mainCategories',$mainCategories);
        View::share('filterProducts',$filterProductsNew);
        View::share('productPrice',$productPrice);
        View::share('subSelectedProperties',$subSelectedProperties);

        return view('Front.Product.filterProducts');
    }
}
