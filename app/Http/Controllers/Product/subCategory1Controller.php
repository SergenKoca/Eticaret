<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\mainCategoryModel;
use App\Models\subCategory1Model;
use App\Models\subCategory2Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class subCategory1Controller extends Controller
{
    public function select_sub_category(Request $request){
        $mainCategories = mainCategoryModel::find($request->main_id);
        $subCategories1 = subCategory1Model::find($request->sub_cate_1_id);
        $subCategories2 = subCategory2Model::all()->where('menu_id',$request->sub_cate_1_id);

        View::share('mainCategories',$mainCategories);
        View::share('subCategories1',$subCategories1);
        View::share('subCategories2',$subCategories2);

        return view('admin.product.select_sub_category_2');
    }
}
