<?php

namespace App\Http\Controllers;

use App\Models\blood_group;
use App\Models\BloodBank;
use App\Models\BloodOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Hash;

class BloodBankController extends Controller
{
    public function newregistration(request $req)
    {
        $validate = $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'lat' => 'required',
            'lon' => 'required',
            'state' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'dist' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $banks = new BloodBank();
        $banks->name = $req->name;
        $banks->email = $req->email;
        $banks->password = hash::make($req->password);
        $banks->latitude = $req->lat;
        $banks->longitude = $req->lon;
        $banks->state = $req->state;
        $banks->city = $req->city;
        $banks->phone = $req->phone;
        $banks->dist = $req->dist;
        $banks->pin = $req->pin;
        $res = $banks->save();

        if ($res) {
            return back()->with('success', 'You have registered successfully');
        } else {
            return back()->with('failed', 'You have not registered successfully');
        }
    }

    // return data to bloodbank's home page
    public function bloodGroup()
    {
        $bloodBanks = blood_group::all(); // Fetch all blood banks from the database
        return $bloodBanks;

    }


    public function showBloodBanks(request $req)
    {
        $query = BloodBank::query();

        if ($req->ajax()) {
            $banks = DB::table('blood_bank_blood_group')
                ->join('blood_group', 'blood_bank_blood_group.blood_group_id', '=', 'blood_group.blood_group_id')
                ->join('blood_banks', 'blood_bank_blood_group.blood_bank_id', '=', 'blood_banks.id')
                ->where('blood_bank_blood_group.blood_group_id', function ($subquery) use ($req) {
                    $subquery->select('blood_group_id')
                        ->from('blood_group')
                        ->where('group_name', $req->search);
                })->get();

            //    $banks = $query->where('id', $req->search)->get();
            Session::put('bloodB_search_result', $banks);
            return response()->json(['success' => true]);
        } else {

            $bloodbanks = $query->where('id', '')->get();
            return view('Blood_Booking/bloodB_home', compact('bloodbanks'));
        }

    }

   public function submitOrder(request $req){
    $validate = $req->validate([
        'pat_name' => 'required',
        'pat_age' => 'required',
        'cont_num' => 'required',
        'prex' => 'required|mimes:png,jpg,pjpeg',
        'gender' => 'required',
    ], [
        'pat_name.required' => 'Patient name is required.',
        'pat_age.required' => 'Patient age is required.',
        'cont_num.required' => 'Contact number is required.',
        'prex.required' => 'Prescription is required.',
        'gender.required' => 'Gender is required.',
    ]);
    
    if($req->has('prex')){
        $file=$req->file('prex');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $path='uploads/prescription/';
        $file->move($path,$filename);
    }
    // generate the order id
    $lastOrder = BloodOrder::orderBy('order_id', 'desc')->first();
    if ($lastOrder == null) {
    $numericPart = "00000";
    } else {
    // Extract the numeric part of the existing order ID
    $numericPart = substr($lastOrder->order_id, 3);
    }
    // $numericPart="0000";
    $newNumericPart = str_pad((intval($numericPart) + 1), strlen($numericPart), '0', STR_PAD_LEFT);
    $newOrderID = "BLD" . $newNumericPart;
    $order_type="Blood_Booking";
    $current_time = Carbon::now();

    //calculate price
    $price= session('blood_price')*$req->quantity;
    $orders = new BloodOrder();
    $orders->order_id=$newOrderID;
    $orders->order_type=$order_type;
    $orders->user_id=session()->get('user_id');
    $orders->bank_id=$req->bank_id;
    $orders->pat_name = $req->pat_name;
    $orders->pat_age = $req->pat_age;
    $orders->pat_gender = $req->gender;
    $orders->phone_no = $req->cont_num;
    $orders->prex = $path.$filename;
    $orders->order_status = "process";
    $orders->blood_gr=$req->blood_gr;
    $orders->quantity=$req->quantity;
    $orders->price=$price;
    $orders->date=date('Y-m-d');
    $orders->time=date('H:i:s');
    $res = $orders->save();
    // $orders-> = $req->pat_age;

    // if ($res) {
    //     return back()->with('success', 'You have registered successfully');
    // } else {
    //     return back()->with('failed', 'You have not registered successfully');
    // }
   }

   public function BloodBank_admin(){
    $bank_id=session('bloodBank_id');
    $bloodOrders = DB::table('blood_orders')
    ->where('bank_id', $bank_id)
    ->where('order_status', 'process')
    ->get();
   
    $bloodOrders_complete = DB::table('blood_orders')
    ->where('bank_id', $bank_id)
    ->where('order_status', 'complete')
    ->get();

    

    return view('Blood_Booking/adminPanel')
           ->with('bloodOrders', $bloodOrders)
           ->with('bloodOrders_complete', $bloodOrders_complete);

   }

   public function approve_order(string $Order_id) {
        // Update the order status to 'complete' where order_id matches
        DB::table('blood_orders')
        ->where('order_id', $Order_id)
        ->update(['order_status' => 'complete']);

        return redirect()->back();
    }

    public function delete_order(string $Order_id) {
        // Delete the record where order_id matches
        DB::table('blood_orders')
            ->where('order_id', $Order_id)
            ->delete();
        
            return redirect()->back();
    }
    
}
