<?php

namespace App\Http\Controllers\Product\Edit;

use App\Http\Controllers\Controller;
use App\Models\mainCategoryModel;
use App\Models\Product\ProductCategory;
use App\Models\Product\Productv2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class editController extends Controller
{
    public function editProduct(Request $request){
        $product = Productv2::find($request->product_id);
        View::share('product',$product);
        /*$productCategory = ProductCategory::where('product_id',$request->product_id)->first();
        View::share('productCategory',$productCategory);*/
        $mainCategories = mainCategoryModel::all();
        View::share('mainCategories',$mainCategories);
        return view('admin.product.edit.edit_product');
    }

    public function editProductPost(Request $request){
        $product = Productv2::find($request->product_id);
        $product->title = $request->input('title');
        $product->save();

        $productCategory = ProductCategory::where('product_id',$request->product_id)->first();
        $productCategory->main_category_id = $request->input('main_id');
        $productCategory->sub_category_1_id = $request->input('sub1_id');
        $productCategory->sub_category_2_id = $request->input('sub2_id');
        $productCategory->save();

        return redirect()->route('product.listController.getProductList');
    }
}
