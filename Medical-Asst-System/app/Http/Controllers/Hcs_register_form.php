<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Hcs_register_form extends Controller
{
    //
    public function index(){
        return view("hcs_booking_form");
    }
    public function register(Request $request){
        $request->validate(
           ['name' => 'required',
           'contact'=>'required',
           'lmark'=>'required',
           'address'=>'required']
        );
        return view("hcs_booking_confirmation");
    }
}
