<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hcs_order;

class Hcs_register_form extends Controller
{
    //
    public function index(){
        return view("hcs_booking_form");
    }
    public function register(Request $request){
        $request->validate(
           ['name' => 'required',
           'gender'=>'required',
           'contact_num'=>'required',
           'land_mark'=>'required',
           'address'=>'required',
           'district'=>'required',
           'state'=>'required',
           'pincode'=>'required',
           ]
        );
        $order_table = new Hcs_order;
        $order_table->emp_id =0;
        $order_table->order_type = "A";
        $order_table->name = $request->input('name');
        $order_table->gender = $request->input('gender');
        $order_table->contact_num = $request->input('contact_num');
        $order_table->land_mark = $request->input('land_mark');
        $order_table->address = $request->input('address');
        $order_table->district = $request->input('district');
        $order_table->state = $request->input('state');
        $order_table->pincode = $request->input('pincode');
        $order_table->payment_status = "No";
        $order_table->order_loc_lat = 0;
        $order_table->order_loc_long = 0;
        $order_table->otp = 0;
        $order_table->save();
        return view("hcs_booking_confirmation");
    }
}
