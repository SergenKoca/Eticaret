<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ContactInfoController extends Controller
{

    public function createContactInfo(Request $request){

        $user = auth()->user();
        $contactInfo = ContactInfo::where('user_id',$user->id)->first();

        if($contactInfo == null){
            // yeni iletişim bilgisi oluştur.
            $contactInfo = new ContactInfo();
            $contactInfo->user_id = $user->id;
            $contactInfo->user_adress = $request->input('user_adress');
            $contactInfo->user_phone = $request->input('user_phone');
            $contactInfo->save();
        }
        else{
            // güncelleme yap
            $contactInfo->user_adress = $request->input('user_adress');
            $contactInfo->user_phone = $request->input('user_phone');
            $contactInfo->save();
        }
        return back();
    }
}
