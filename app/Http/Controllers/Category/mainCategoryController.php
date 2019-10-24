<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\mainCategoryModel;
use Illuminate\Http\Request;

class mainCategoryController extends Controller
{
    public function index(){
        return view('admin.category.create_main_category');
    }

    public function addMainCategory(Request $request){
        $mainCateModel = new mainCategoryModel();
        $mainCateModel->title = $request->title;
        $mainCateModel->order = $request->order;

        $mainCateModel->save();

        return redirect()->route('name_add.main.menu');
    }
}
