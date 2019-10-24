<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\mainPropertyModel;
use App\Models\subPropertyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class subPropertyController extends Controller
{
    public function index(){
        $mainProperties = mainPropertyModel::all();
        View::share('mainProperties',$mainProperties);
        return view('admin.property.create_sub_property');
    }

    public function add_sub_property(Request $request){
        $subProp = new subPropertyModel();
        $subProp->main_property_id = $request->main_property_id;
        $subProp->title = $request->title;
        $subProp->order = $request->order;

        $subProp->save();

        return redirect()->route('name_add.sub.property');
    }
}
