<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hcs_order;
use App\Models\Payments_records;
use Mail;
use App\Mail\Hcs_emp_booking_mail;

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
        
        $user_id = session()->get('user_id');
        $amb_ride_amount = 500;
        $order_table = new Hcs_order;
        $rowCount = Hcs_order::count();

        $randomNumber = rand(15, 35);

        $order_id = "HCS" . $randomNumber . $rowCount;

        $order_table->order_id = $order_id;
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
        $order_table->otp = rand(0000,9999);
        $order_table->save();
        $redirectUrl = url('/hcs_show_data') . "?order_id=$order_id&amount=$amb_ride_amount&user_id=$user_id";

        // Redirect to the constructed URL
        return redirect()->away($redirectUrl . "&order_id=$order_id");
        if($request->ajax())
            {
        $details = compact('amb_ride_amount','order_id','user_id');
        return response()->json($details);}

        return view("hcs_booking_confirmation");
    }
    public function show_form_data(Request $request){
        $order_id = $request->query('order_id');
        $userdata= Hcs_order::where('order_id', $order_id)->first(); 
        $data = compact('userdata');
        return view("hcs_razor_pay")->with($data);
    }
    public function process_payment(Request $request){
    if($request->ajax())
        {
    $payment_entry_model = new Payments_records();
    $count = Payments_records::count();
    $payment_entry_model->payment_id = $count;
    $payment_entry_model->order_id = $request->order_id;
    $payment_entry_model->user_id = session()->get('user_id');
    $payment_entry_model->amount = 500;
    $payment_entry_model->service_type = "Healthcare Support";
    $payment_entry_model->payment_status = "Initiated";
    $payment_entry_model->payment_date = date('Y-m-d');
    $payment_entry_model->payment_time = date('H:i:s');
    $request->session()->put('pid',$count);
    $payment_entry_model->save();
    $request->session()->put('order_id', $request->order_id);
    }
        
    }
    public function paymentSuccess(Request $request)
    { $orderId = $request->session()->get('order_id');

        $payment_id_update = Payments_records::where('order_id',$orderId)->update(['payment_status' => 'completed']);
        if($payment_id_update)
        { 
        $userdata= Hcs_order::where('order_id', $orderId)->first(); 
        Mail::to('rameshroyprl2019@gmail.com')->send(new Hcs_emp_booking_mail($userdata));   
        return view('hcs_payment_ackn');}
    }
    public function hcsPayment(Request $request){
    // Retrieve data from session
    $orderId = $request->session()->get('order_id');
    $amount = $request->session()->get('amount');
    //     $email= "ALU";
    // // Use $orderId and $amount as needed
    
    // Mail::to('rameshroyprl2019@gmail.com')->send(new Hcs_emp_booking_mail($email));
    return view('hcs_payment_process', compact('orderId', 'amount'));
    }
}