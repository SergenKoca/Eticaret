<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\mainPropertyModel;
use App\Models\Product\ProductCategory;
use App\Models\Product\Productv2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class productCategoryController extends Controller
{
    public function create_product_category(Request $request){
        $productModel = new Productv2();
        $productModel->title = $request->title;

        if($request->hasFile('image')){
            $file=$request->file('image');
            $file->move(public_path() . '/images/news',$file->getClientOriginalName());
            $productModel->img_url=$file->getClientOriginalName();
        }

        $productModel->save();

        $productCategory = new ProductCategory();
        $productCategory->product_id = Productv2::all()->last()->id;
        $productCategory->main_category_id = $request->main_id;
        $productCategory->sub_category_1_id = $request->sub_1_id;
        $productCategory->sub_category_2_id = $request->id;

        $productCategory->save();

        $product_id=Productv2::all()->last()->id;
        $mainproperties = mainPropertyModel::all();
        View::share('product_id',$product_id);
        View::share('mainproperties',$mainproperties);
        return redirect()->route('name_product.main.controller');

        // Ürün tablosuna ve ürün-kategori tablosuna veri eklendi
    }
}
