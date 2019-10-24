<?php

namespace App\Http\Controllers\Product\AddProperty;

use App\Http\Controllers\Controller;
use App\Models\mainPropertyModel;
use App\Models\Product\ProductProperty;
use App\Models\Product\Productv2;
use App\Models\subPropertyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class selectProperties extends Controller
{
    public function select_main_property(Request $request){
        $mainPropertis = mainPropertyModel::all();
        $product = Productv2::find($request->product_id);
        View::share('mainPropertis',$mainPropertis);
        View::share('product',$product);
        return view('admin.product.AddProperty.add_main_property');
    }

    public function select_sub_property(Request $request){
        $subProperties = subPropertyModel::all()->where('main_property_id',$request->main_id);
        $product = Productv2::find($request->product);
        $mainPropertis = mainPropertyModel::find($request->main_id);
        View::share('subProperties',$subProperties);
        View::share('product',$product);
        View::share('mainPropertis',$mainPropertis);

        return view('admin.product.AddProperty.add_sub_property');
    }

    public function add_property(Request $request){
        $productProp = new ProductProperty();
        $product = Productv2::find($request->product);
        $productProp->product_id=$product->id;
        $productProp->main_property_id = $request->main_id;
        $productProp->sub_property_id = $request->sub_property_id;

        $productProp->save();


        return redirect()->route('product.addProperty.selectCategories');
    }
}
