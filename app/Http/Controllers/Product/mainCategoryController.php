<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\mainCategoryModel;
use App\Models\subCategory1Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class mainCategoryController extends Controller
{
    public function index(){
        $mainCategories = mainCategoryModel::all();
        View::share('mainCategories',$mainCategories);
        return view('admin.product.select_main_category');
    }

    public function select_sub_category(Request $request){
        $mainCategories = mainCategoryModel::find($request->id);
        $subCateies1 = subCategory1Model::all()->where('menu_id',$request->id);
        View::share('subCategories1',$subCateies1);
        View::share('mainCategories',$mainCategories);
        return view('admin.product.select_sub_category_1');
    }
}
