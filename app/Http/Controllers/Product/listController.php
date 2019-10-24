<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\mainCategoryModel;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductPrice;
use App\Models\Product\ProductProperty;
use App\Models\Product\Productv2;
use App\Models\subCategory1Model;
use App\Models\subCategory2Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class listController extends Controller
{
    public function getProductList(){
        $productCategories = ProductCategory::all();
        $productsID = ProductCategory::select('product_id')->get();
        $mainCategoriesID = ProductCategory::select('main_category_id')->get();
        $sub1CategoriesID = ProductCategory::select('sub_category_1_id')->get();
        $sub2CategoriesID = ProductCategory::select('sub_category_2_id')->get();

        $products[] = '';
        foreach ($productsID as $key => $item){
            $products[$key] = Productv2::find($item)->first();
        }

        $mains = array();
        foreach ($mainCategoriesID as $key => $item){
            $mains[$key] = mainCategoryModel::find($item)->first();
        }

        $subs1 = array();
        foreach ($sub1CategoriesID as $key => $item){
            $subs1[$key] = subCategory1Model::find($item)->first();
        }

        $subs2 = array();
        foreach ($sub2CategoriesID as $key => $item){
            $subs2[$key] = subCategory2Model::find($item)->first();
        }

        View::share('products',$products);
        View::share('mains',$mains);
        View::share('subs1',$subs1);
        View::share('subs2',$subs2);

        return view('admin.product.product_list');
    }

    public function delete(Request $request){

        $product = Productv2::find($request->product_id);
        $product->delete();

        $productC = ProductCategory::where('product_id',$request->product_id)->first();
        if($productC!=null)
            $productC->delete();

        $productProperty = ProductProperty::where('product_id',$request->product_id)->first();
        if($productProperty!=null)
            $productProperty->delete();

        $productPrice = ProductPrice::where('product_id',$request->product_id)->first();
        if($productPrice!=null)
            $productPrice->delete();

        return redirect()->route('product.listController.getProductList');
    }
}
