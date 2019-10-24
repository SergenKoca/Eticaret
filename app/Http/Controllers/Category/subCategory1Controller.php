<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\mainCategoryModel;
use App\Models\subCategory1Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class subCategory1Controller extends Controller
{
    public function index(){
        $mainCategories = mainCategoryModel::all();
        View::share('mainCategories',$mainCategories);
        return view('admin.category.create_sub_category_1');
    }

    public function add_sub_category(Request $request){
        $subCate1 = new subCategory1Model();
        $subCate1->menu_id = $request->menu_id;
        $subCate1->title = $request->title;
        $subCate1->order = $request->order;

        $subCate1->save();

        return redirect()->route('name_add.sub.cate1');
    }
}
