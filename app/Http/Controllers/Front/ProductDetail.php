<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CategoryPropertyModel;
use App\Models\mainCategoryModel;
use App\Models\mainPropertyModel;
use App\Models\Product\Basket;
use App\Models\Product\BasketProperty;
use App\Models\Product\LatestProduct;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductPrice;
use App\Models\Product\ProductProperty;
use App\Models\Product\Productv2;
use App\Models\Product\ViewProduct;
use App\Models\subCategory1Model;
use App\Models\subPropertyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class ProductDetail extends Controller
{
    public function index(Request $request){
        // MENÜLERİ GETİR
        $mainCategories = mainCategoryModel::all();
        $sub1Categories = subCategory1Model::all();
        View::share('mainCategories',$mainCategories);
        View::share('sub1Categories',$sub1Categories);

        $selectProduct = Productv2::find($request->id);
        View::share('selectProduct',$selectProduct);
        View::share('price',$request->price);

        $user = Auth::user();
        if($user !=null){
            $control=LatestProduct::where('user_id',$user->id)->where('product_id',$request->id)->first();
            if($control==null){
                // Son bakılan ürünlere ekle.
                $latestProduct = new LatestProduct();
                $latestProduct->product_id = $request->id;
                $latestProduct->user_id = $user->id;
                $latestProduct->save();
            }
        }

        $goruntulenme = 0;
        if($user != null){
            $control2 = ViewProduct::where('user_id',$user->id)->where('product_id',$request->id)->first();
            if($control2 == null){
                // görüntülenme tablosuna ekle
                $viewProduct = new ViewProduct();
                $viewProduct->user_id = $user->id;
                $viewProduct->product_id = $request->id;
                $viewProduct->view = 1;
                $viewProduct->save();
                $goruntulenme = 1;
                View::share('view',$goruntulenme);
            }
            else{
                // görüntülenme tablosunu güncelle
                $viewCount = $control2->view;
                $viewCount = $viewCount + 1;
                $control2->view = $viewCount;
                $control2->save();
                $goruntulenme = $viewCount;
                View::share('view',$goruntulenme);
            }
        }

        // özellikleri getir
        $categoryProduct = CategoryPropertyModel::where('main_category_id',$request->main_category_id)
            ->where('sub_category_1_id',$request->sub_category_1_id)->where('sub_category_2_id',$request->sub_category_2_id)->get();

        View::share('main_category_id',$request->main_category_id);
        View::share('sub_category_1_id',$request->sub_category_1_id);
        View::share('sub_category_2_id',$request->sub_category_2_id);

        $mainProperties = array();
        foreach ($categoryProduct as $key => $item) {
            $mainProperties[$key] = mainPropertyModel::where('id',$item->main_property_id)->firstOrFail();
        }
        $subProperties = subPropertyModel::all();

        // seçilen ürüne ait özellikleri aktif yap.
        $productProperties = ProductProperty::where('product_id',$request->id)->get();
       View::share('productProperties',$productProperties);

       // ilişkili ürünleri getir.
        $relatedProducts = ProductCategory::where('main_category_id',$request->main_category_id)
            ->where('sub_category_1_id',$request->sub_category_1_id)->where('sub_category_2_id',$request->sub_category_2_id)->orderBy(DB::raw('RAND()'))->take(5)->get();
        $relatedProductsPrice = array();
        $relatedProductsInfo = array();
        foreach ($relatedProducts  as $key=> $item){
            $relatedProductsInfo[$key] = Productv2::find($item->product_id);
            $relatedProductsPrice[$key] = ProductPrice::where('product_id',$item->product_id)->first();
            if($relatedProductsPrice[$key] == null){
                $relatedProductsPrice[$key] = "-";
            }
        }

        // sepetteki ürün sayısını getir.
        $basket = Basket::where('user_id',auth()->user()->id)->get();
        $basketProductCount = 0;
        if($basket != null){
            $basketProductCount = count($basket);
        }
        View::share('basketProductCount',$basketProductCount);

        View::share('relatedProductsPrice',$relatedProductsPrice);
        View::share('relatedProductsInfo',$relatedProductsInfo);

        View::share('mainProperties',$mainProperties);
        View::share('subProperties',$subProperties);

        return view('Front.Product.ProductDetail');
    }

    public function addtoBasket(Request $request){
        if(auth()->user() == null){
            return redirect()->route('login');
        }
        $selectedDatas = $request->all();
        $subCategoriesId = array();
        foreach ($selectedDatas as $key=> $item){
            if(Str::contains($item,'subid')){
                $subCategoriesId[$key] = $item;
            }
        }

        $subCategoriesIdSplit = array();
        foreach ($subCategoriesId as $key=> $item){
            $subCategoriesIdSplit[$key] = explode('_',$item)[1];
        }

        $mainProperties = array();
        foreach ($subCategoriesIdSplit as $key => $item){
            $mainProperties[$key] = subPropertyModel::where('id',$item)->select('main_property_id')->first();
        }


        $basket = new Basket();
        $basket->user_id = auth()->id();
        $basket->product_id = $request->product_id;
        $basket->save();

        // basket Property'e ekle.
        $products = Basket::where('user_id',auth()->id())->get();
        $reversed = $products->reverse();
        $lastBasket = $reversed->first();

        foreach ($subCategoriesIdSplit as $key=> $item){
            $basketProperty = new BasketProperty();
            $basketProperty->user_id = auth()->id();
            $basketProperty->basket_id=$lastBasket->id;
            $basketProperty->main_property_id=$mainProperties[$key]->main_property_id;
            $basketProperty->sub_property_id=$item;

            $basketProperty->save();
        }

        return redirect()->route('name_front.get.basket');
    }
}
