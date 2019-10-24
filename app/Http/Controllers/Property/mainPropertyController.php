<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\mainPropertyModel;
use Illuminate\Http\Request;

class mainPropertyController extends Controller
{
    public function index_main(){
        return view('admin.property.create_main_property');
    }

    public function add_main_property(Request $request){
        $mainProp = new mainPropertyModel();
        $mainProp->title = $request->title;
        $mainProp->order = $request->order;
        $mainProp->save();

        return redirect()->route('name_add_main_property');
    }
}
