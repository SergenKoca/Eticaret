<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\mainCategoryModel;
use App\Models\subCategory1Model;
use App\Models\subCategory2Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class listController extends Controller
{
    public function getCategories(){
        $mainCategories = mainCategoryModel::all();
        $subCategories1 = subCategory1Model::all();
        $subCategories2 = subCategory2Model::all();
        View::share('mainCategories',$mainCategories);
        View::share('subCategories1',$subCategories1);
        View::share('subCategories2',$subCategories2);
        return view('admin.category.list_category');
    }

    public function deleteMainCategory(Request $request){
        $category = mainCategoryModel::find($request->main_cate_id);
        $category->delete();

        return redirect()->route('name_list_category');
    }
    public function deleteSubCategory1(Request $request){
        $category = subCategory1Model::find($request->sub_cate_1);
        $category->delete();

        return redirect()->route('name_list_category');
    }
    public function deleteSubCategory2(Request $request){
        $category = subCategory2Model::find($request->sub_cate_2);
        $category->delete();

        return redirect()->route('name_list_category');
    }

    public function editMainCategory(Request $request){
        $category = mainCategoryModel::find($request->main_cate_id);
        View::share('category',$category);
        return view('admin.category.edit.edit_main_category');
    }
    public function editMainCategoryPost(Request $request){
        $category = mainCategoryModel::find($request->main_cate_id);
        $category->title = $request->input('title');
        $category->order = $request->input('order');

        $category->save();

        return redirect()->route('name_list_category');
    }
    public function editSub1Category(Request $request){
        $mainCategories = mainCategoryModel::all();
        $category = subCategory1Model::find($request->sub_cate_1);
        View::share('mainCategories',$mainCategories);
        View::share('category',$category);
        return view('admin.category.edit.edit_sub_category_1');
    }
    public function editSub1CategoryPost(Request $request){

        // önce sil
        $category = subCategory1Model::find($request->sub_cate_1);
        $category->delete();

        $sub1 = new subCategory1Model();
        $sub1->menu_id = $request->input('menu_id');
        $sub1->title = $request->input('title');
        $sub1->order = $request->input('order');

        $sub1->save();

        return redirect()->route('name_list_category');
    }

    public function editSub2Category(Request $request){
        $mainCategories = mainCategoryModel::all();
        $sub2 = subCategory2Model::find($request->sub_cate_2);
        View::share('mainCategories',$mainCategories);
        View::share('sub2',$sub2);
        return view('admin.category.edit.edit_sub_category2');
    }

    public function editSub2CategoryPost(Request $request){
        $category = subCategory2Model::find($request->sub_cate_2);
        $category->delete();

        $sub2 = new subCategory2Model();
        $sub2->title = $request->input('title');
        $sub2->order = $request->input('order');
        $sub2->menu_id = $request->input('sub1_id');

        $sub2->save();

        return redirect()->route('name_list_category');
    }
}
