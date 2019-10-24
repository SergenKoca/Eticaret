<?php

namespace App\Http\Controllers\Product\AddPrice;

use App\Http\Controllers\Controller;
use App\Models\mainCategoryModel;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductPrice;
use App\Models\Product\Productv2;
use App\Models\subCategory1Model;
use App\Models\subCategory2Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class selectCategory extends Controller
{
    public function index(){
        $mainCategories = mainCategoryModel::all();
        View::share('mainCategories',$mainCategories);

        return view('admin.product.AddPrice.selectCategory');
    }

    public function get_sub1_categories_ajax(Request $request)
    {
        $sub1_categories = subCategory1Model::where('menu_id', $request->main_category_id)->get();
        return $sub1_categories;
    }
    public function get_sub2_categories_ajax(Request $request)
    {
        $sub2_categories = subCategory2Model::where('menu_id', $request->sub1_category_id)->get();
        return $sub2_categories;
    }

    public function get_products_ajax(Request $request)
    {
        $productCategories = ProductCategory::where('sub_category_2_id',$request->sub2_category_id)->select('product_id')->get();
        $products = array();
        foreach ($productCategories as $key => $productCategory) {
            $products[$key] = Productv2::where('id',$productCategory->product_id)->firstOrFail();
        }
        return $products;
    }

    public function createProductPrice(Request $request){
        $productPrice = new ProductPrice();
        $productPrice->product_id = $request->product_id;
        $productPrice->price = $request->price;

        $productPrice->save();

        return redirect()->route('product.addPrice.selectCategory');
    }

}
