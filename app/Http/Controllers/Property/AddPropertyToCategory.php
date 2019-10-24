<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\CategoryPropertyModel;
use App\Models\mainCategoryModel;
use App\Models\mainPropertyModel;
use App\Models\Product\ProductCategory;
use App\Models\Product\Productv2;
use App\Models\subCategory1Model;
use App\Models\subCategory2Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AddPropertyToCategory extends Controller
{
    public function index(){
        $mainCategories = mainCategoryModel::all();
        View::share('mainCategories',$mainCategories);
        return view('admin.property.add_property_to_category');
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

    public function getProperties(Request $request)
    {
        $properties = mainPropertyModel::all();
        return $properties;
    }

    public function createCategoryPropery(Request $request){
        $categoryModel = new CategoryPropertyModel();
        $categoryModel->main_category_id = $request->main_id;
        $categoryModel->sub_category_1_id = $request->sub1_id;
        $categoryModel->sub_category_2_id = $request->sub2_id;
        $categoryModel->main_property_id = $request->property_id;

        $categoryModel->save();

        return redirect()->route('name_add.property.to.category');

    }
}
