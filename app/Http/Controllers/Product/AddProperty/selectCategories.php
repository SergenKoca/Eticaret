<?php

namespace App\Http\Controllers\Product\AddProperty;

use App\Http\Controllers\Controller;
use App\Models\mainCategoryModel;
use App\Models\Product\ProductCategory;
use App\Models\Product\Productv2;
use App\Models\subCategory1Model;
use App\Models\subCategory2Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class selectCategories extends Controller
{
    public function index(){
        $mainCategories = mainCategoryModel::all();
        View::share('mainCategories',$mainCategories);
        return view('admin.product.AddProperty.select_main_category');
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


    // bundan sonrası iptal gerek kalmadı..
    public function select_sub_category_1(Request $request){
        $subCategories1 = subCategory1Model::all()->where('menu_id',$request->main_id);
        View::share('subCategories1',$subCategories1);
        View::share('main_id',$request->main_id);
        return view('admin.product.AddProperty.select_sub_category_1');
    }

    public function select_sub_category_2(Request $request){
        $subCategories2 = subCategory2Model::all()->where('menu_id',$request->sub_cate_1_id);
        View::share('subCategories2',$subCategories2);
        View::share('main_id',$request->main_id);
        View::share('sub_cate_1_id',$request->sub_cate_1_id);
        return view('admin.product.AddProperty.select_sub_category_2');
    }

    public function select_product(Request $request){
        $productCategories =  ProductCategory::all()->where('main_category_id',$request->main_id)->where('sub_category_1_id',$request->sub_cate_1_id)
            ->where('sub_category_2_id',$request->sub_cate_2_id);

        $veriler[] = '';
        $i=0;
        foreach ($productCategories as  $item){
            $products = Productv2::find($item->product_id);
            $veriler[$i] = $products;
            $i++;
        }
        View::share('productCategories',$veriler);
        return view('admin.product.AddProperty.select_product');
    }
}
