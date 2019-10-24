<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\mainPropertyModel;
use App\Models\subPropertyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class listController extends Controller
{
    public function get_list(){
        $mainPropies = mainPropertyModel::all();
        $subPropies = subPropertyModel::all();

        View::share('mainProperties',$mainPropies);
        View::share('subProperties',$subPropies);

        return view('admin.property.list_property');
    }

    public function deleteMainProperty(Request $request){
        $property = mainPropertyModel::find($request->main_id);
        $property->delete();

        return redirect()->route('name_get_list');
    }

    public function deleteSubProperty(Request $request){
        $property = subPropertyModel::find($request->sub_id);
        $property->delete();

        return redirect()->route('name_get_list');
    }

    public function editMainProperty(Request $request){
        $property = mainPropertyModel::find($request->main_id);
        View::share('property',$property);
        return view('admin.property.edit.edit_main_property');
    }
    public function editMainPropertyPost(Request $request){
        $property = mainPropertyModel::find($request->main_id);
        $property->title = $request->input('title');
        $property->order = $request->input('order');
        $property->save();
        return redirect()->route('name_get_list');
    }

    public function editSubProperty(Request $request){
        $mainProperties = mainPropertyModel::all();
        $sub = subPropertyModel::find($request->sub_id);
        View::share('mainProperties',$mainProperties);
        View::share('sub',$sub);
        return view('admin.property.edit.edit_sub_property');
    }
    public function editSubPropertyPost(Request $request){
        $sub = subPropertyModel::find($request->sub_id);
        $sub->delete();

        $property = new subPropertyModel();
        $property->title = $request->input('title');
        $property->order  = $request->input('order');
        $property->main_property_id = $request->input('main_property_id');

        $property->save();
        return redirect()->route('name_get_list');
    }
}
