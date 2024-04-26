<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_info;

class UserregController extends Controller
{
    public function DisplayForm(){
        return view ('user_register');
    }
    public function StoreUserData(Request $request){
        // $request->validate([
        //     "user_id"=>"required|max:10|",
        //     "user_first_name"=>"required|max:50|",
        //     "user_last_name"=>"required|max:50|",
        //     "user_email"=>"required|email",
        //     // "user_lat"=>"required",
        //     // "user_long"=>"required",
        //     "user_contactno"=>"required|max:10",
        //     "user_dob"=>"required",
        //     "user_aadhaar"=>"required|max:12",
        //     "user_gender"=>"required",
        //     "user_district"=>"required",
        //     "user_city"=>"required",
        //     "user_state"=>"required",
        //     "pincode"=>"required|max:6",
        //     "user_password"=>"required",
        // ]);
        $user = new User_info;

        // random user id generate starts here
        $randomNumber = str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
        $user_id = "USR".$randomNumber;
        // random user id generate ends here
        $user->user_id = $user_id;
        $user->user_first_name = $request['user_first_name'];
        $user->user_last_name = $request['user_last_name'];
        $user->user_email = $request['user_email'];
        // needs to add 
        // $user->user_lat= $request['user_lat'];
        // $user->user_long= $request['user_long'];
        $user->user_contactno = $request['user_contactno'];
        $user->user_dob = $request['user_dob'];
        $user->user_aadhaar = $request['user_aadhaar'];
        $user->user_gender = $request['user_gender'];
        $user->user_district = $request['user_district'];
        $user->user_city = $request['user_city'];
        $user->user_state = $request['user_state'];
        $user->pincode = $request['pincode'];
        $user->user_password = $request['user_password'];
        $user->save();
        return redirect('/');
    }
}
