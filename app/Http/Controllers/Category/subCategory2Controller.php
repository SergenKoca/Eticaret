<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\mainCategoryModel;
use App\Models\subCategory1Model;
use App\Models\subCategory2Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class subCategory2Controller extends Controller
{
    public function index_main(){
        $mainCategories = mainCategoryModel::all();
        return view('admin.category.sub_category.select_main_category',['mainCategories'=>$mainCategories]);
    }

    public function index_sub_category1(Request $request){
        $main_id = $request->id;
        $mainCategory = mainCategoryModel::find($main_id);
        $subCategories = subCategory1Model::all()->where('menu_id',$main_id);
        View::share('subCategories',$subCategories);
        View::share('mainCategory',$mainCategory);
        return view('admin.category.sub_category.select_sub_category_1');
    }

    public function add_sub_category2_post(Request $request){
        $sub2Model = new subCategory2Model();
        $sub2Model->menu_id = $request->sub_cate_1_id;
        $sub2Model->title = $request->title;
        $sub2Model->order = $request->order;

        $sub2Model->save();
        return redirect()->route('name_admin.main');
    }
}
