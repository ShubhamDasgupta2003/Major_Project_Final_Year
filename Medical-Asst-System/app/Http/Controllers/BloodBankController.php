<?php

namespace App\Http\Controllers;

use App\Models\blood_group;
use App\Models\Payments_records;
use App\Models\BloodBank;
use App\Models\BloodOrder; 
use App\Models\medical_supplies_order; 
use App\Models\testOrders; 
use App\Models\Patient_ambulance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Hash;

use Mail;
// use Illuminate\Support\Facades\Mail;
use App\Mail\Blood_Booking_Confirmation_mail;

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
        $banks->password = Hash::make($req->password);
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


    // Methods for order and payments n,fdsnfdsnflsal

    // step:1 
   public function submitOrder(request $req){
    $validate = $req->validate([
        'pat_name' => 'required',
        'pat_age' => 'required|integer|between:1,100',
        'cont_num' => 'required|regex:/^[0-9]{10}$/',
        'prex' => 'required|mimes:png,jpg,pjpeg',
        'gender' => 'required',
        'address' => 'required',
        'landmark' => 'required',
    ], [
        'pat_name.required' => 'Patient name is required.',
        'pat_age.required' => 'Patient age is required.',
        'pat_age.integer' => 'Patient age must be a number.',
        'pat_age.between' => 'Patient age must be between 17 and 100.',
        'cont_num.required' => 'Contact number is required.',
        'cont_num.regex' => 'Contact number must be a 10-digit number.',
        'prex.required' => 'Prescription is required.',
        'prex.mimes' => 'Prescription must be a file of type: png, jpg, pjpeg.',
        'gender.required' => 'Gender is required.',
        'address.required' => 'Address is required.',
        'landmark.required' => 'Please enter a landmark.',
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
    $order_status="process";
    $pay_status="due";
    
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
    $orders->order_status =$order_status;
    $orders->paymentstatus =$pay_status;
    $orders->blood_gr=$req->blood_gr;
    $orders->quantity=$req->quantity;
    $orders->price=$price;
    $orders->date=date('Y-m-d');
    $orders->time=date('H:i:s');
    $orders->address=$req->address;
    $orders->landmark=$req->landmark;
    $res = $orders->save();

    // $orders-> = $req->pat_age;

   return view('Blood_Booking/payment',['orders' => $orders]);
   }

  
    //step:2 
    public function proceedToPay(Request $req){
        //data fetch from the href links
        
        $orderId = $req->input('order_id');
        $amount = $req->input('amount');
        $serviceType = $req->input('service_type');

        return view('Blood_Booking/proceedToPay', compact('orderId', 'amount','serviceType'));
    }


    //step:3
     public function process_payment(Request $request){
        if($request->ajax())
       {
        $payment_entry_model = new Payments_records();
        $count = Payments_records::count();
        $payment_entry_model->payment_id = $count;
        $payment_entry_model->order_id = $request->order_id;
        $payment_entry_model->user_id = session()->get('user_id');
        $payment_entry_model->amount = $request->amount;
        $payment_entry_model->service_type = $request->type;
        $payment_entry_model->payment_status = "Initiated";
        $payment_entry_model->payment_date = date('Y-m-d');
        $payment_entry_model->payment_time = date('H:i:s');
        $request->session()->put('pid',$count);
        $request->session()->put('order_id',$request->order_id);
        
        // Save the payment record
        if ($payment_entry_model->save()) {
            return response()->json(['success' => true]); // Return success response
        } else {
            return response()->json(['success' => false]); // Return failure response
        }
      }
    }


    public function paymentSuccess(Request $request)
        { 
            $orderId = $request->session()->get('order_id');
    
            Session::put('payment_id', $request->pid);
            
            $payment_id_update = Payments_records::where('order_id',$orderId)->update(['payment_status' => 'completed','payment_id'=>$request->pid]);
            $BloodOrder_payStatus = BloodOrder::where('order_id',$orderId)->update(['paymentStatus' => 'completed']);
            if($payment_id_update)
            { 
            // $userdata= Hcs_order::where('order_id', $orderId)->first(); 
            // Mail::to(session()->get("user_email"))->send(new Hcs_emp_booking_mail($userdata));   
            // return view('Blood_Booking/payment_ack');
          }
        }


    //  Methods for admin 
    public function BloodBank_admin(){
        $bank_id=session('bloodBank_id');
        $bloodOrders = DB::table('blood_orders')
        ->where('bank_id', $bank_id)
        ->where('order_status', 'process')
        ->where('paymentStatus', 'completed')
        ->orderBy('date', 'desc')
        ->orderBy('time', 'desc')
        ->get();
       
        $bloodOrders_complete = DB::table('blood_orders')
        ->where('bank_id', $bank_id)
        ->where('order_status', 'complete')
        ->orderBy('date', 'desc')
        ->orderBy('time', 'desc')
        ->get();
    
        $totalOrders = DB::table('blood_orders')
        ->select(DB::raw('COUNT(order_id) AS comp_orders'))
        ->where('bank_id', $bank_id)
        ->where('order_status','complete')
        ->groupBy('bank_id')
        ->get();
        $count = $totalOrders[0]->comp_orders;
        
 
    
        //find out order in last 24 hour
        $currentTime = Carbon::now();
        $twentyFourHoursAgo = Carbon::now()->subHours(24);
    
        $totalOrdersIn24hr = DB::table('blood_orders')
        ->select(DB::raw('COUNT(order_id) AS comp_orders'))
        ->where('bank_id', $bank_id)
        ->where('order_status','complete')
        ->where('date', '>=', $twentyFourHoursAgo->toDateString()) // Filter by date
        ->orWhere(function($query) use ($twentyFourHoursAgo) {
            $query->where('date', '=', $twentyFourHoursAgo->toDateString())
                ->where('time', '>=', $twentyFourHoursAgo->toTimeString()); // Filter by time
        })
        ->groupBy('bank_id')
        ->get();
    
        // $countIn24hr = $totalOrdersIn24hr[0]->comp_orders;
        $countIn24hr = $totalOrdersIn24hr->isEmpty() ? 0 : $totalOrdersIn24hr[0]->comp_orders;

    
        //find out total earnings
        $result = DB::table('blood_orders')
                ->select(DB::raw('SUM(price) AS earnings'))
                ->where('order_status','complete')
                ->first();
    
        $earnings = $result->earnings;
    
    
    
        return view('Blood_Booking/adminPanel')
               ->with('bloodOrders', $bloodOrders)
               ->with('bloodOrders_complete', $bloodOrders_complete)
               ->with('totalOrders', $count)
               ->with('totalOrdersIn24hr', $countIn24hr)
               ->with('totalEarnings', $earnings);
    
       }
    
       public function approve_order(string $Order_id) {
            // Update the order status to 'complete' where order_id matches
            DB::table('blood_orders')
            ->where('order_id', $Order_id)
            ->update(['order_status' => 'complete','paymentStatus'=>'complete']);

            $mailData=[
                'title'=> 'Blood Booking Confirmation',
                'body' => 'Thank you for your Blood Booking. Your order ID is: ' . $Order_id . 
                'We will sortly provide your blood at your given location.',
            ];
    
           
            Mail::to(Session::get('user_email'))->send(new Blood_Booking_Confirmation_mail($mailData));
            // Mail::to('jagannathsarkar212@gmail.com')->send(new Blood_Booking_Confirmation_mail($mailData));
    
            return redirect()->back();
        }
        
      
    public function delete_order(string $Order_id) {
        // Delete the record where order_id matches
        DB::table('blood_orders')
            ->where('order_id', $Order_id)
            ->update(['order_status' => 'Not approved','paymentStatus'=>'return']);

            $mailData=[
                'title'=> 'Blood Booking Order',
                'body' => 'Your Order is not approved. 
                Your order ID is: ' . $Order_id . 
                '. Your bank will credit the amount you paid within three business days.',
            ];
    
           
            Mail::to(Session::get('user_email'))->send(new Blood_Booking_Confirmation_mail($mailData));
        
            return redirect()->back();
    }



    // ......................to show the orer_history ................. 
    public function orderHistory(){
        $user_id = Session::get('user_id');
        
        // $orders = DB::table('payments')
        // ->select('payments.payment_id', 'payments.order_id','payments.service_type',
        //          'payments.payment_date','payments.amount','payments.payment_status',

        //          'blood_orders.pat_name', 'blood_orders.pat_age',
        //          'test_orders.pat_name', 'test_orders.pat_age')

        // ->join('test_orders', 'payments.order_id', '=', 'test_orders.order_id')
        // ->join('blood_orders', 'payments.order_id', '=', 'blood_orders.order_id')
        // ->where('payments.user_id', $user_id)
        // ->get();

        $bld_orders = DB::table('blood_orders')
        ->select('*')
        ->where('user_id', $user_id)
        ->orderBy('date', 'desc')
        ->orderBy('time', 'desc')
        ->get();

        $medicalorders = medical_supplies_order::where('user_id', session()->get('user_id'))->get();
 

        $amb_ptn_join = Payments_records::join('patient_ambulance','payments.order_id','=','patient_ambulance.invoice_no')->where('patient_ambulance.user_id','=',$user_id)->orderBy('booking_date','DESC')->limit(4)->get();

        return view('Blood_Booking.orderHistory',['bld_orders'=>$bld_orders,'amb_orders'=>$amb_ptn_join,'medicalorders'=>$medicalorders]);
     }
     
     public function ordermdelete(Request $req){
        $order_id = $req->order_id;

        // Retrieve the order time from the database
        DB::table('medical_supplies_orders')
        ->where('order_id', $order_id)
        ->delete();
        // Extract the time attribute from the retrieved order object
        $userEmail = session()->get('user_email');
        $username = session()->get('user_name');
    $data=[
        'tittle'=>'Order Cancelled',
        'date'=>date('m/d/Y'),
        'username'=>$username,
        'useremail' => $userEmail,
     ];
      $data["email"] = $userEmail ;
  
      $data["title"] = "From Emergency Medical Assistance System";
  
      $data["body"] = "Your Order has been cancelled . For further inquiry please contact Emergency Medical Assistance System";
  
  
  
    
  
  
  
      Mail::send('emails.cancel_order', $data, function($message)use($data) {
  
          $message->to($data["email"])
  
                  ->subject($data["title"]);
  
                 
      });
        return redirect()->back();
       

        
     }
    public function showOrderDetail(Request $req){
        $order_id=$req->order_id;

        $orders = DB::table('blood_orders')
        ->select('*')
        ->where('order_id', $order_id)
        ->first();


        return view('Blood_Booking/order_details',['detaildorders'=>$orders]);
       
    }
    public function cancelOrder(Request $req){
        $order_id = $req->order_id;

        // Retrieve the order time from the database
        $order = DB::table('blood_orders')
            ->select('time')
            ->where('order_id', $order_id)
            ->first();

        // Extract the time attribute from the retrieved order object
        $order_time = $order->time;

        // Parse the order time using Carbon
        $orderTime = Carbon::parse($order_time);
        $currentTime = Carbon::now();
        $timeDifference = $currentTime->diffInMinutes($orderTime);

        // If the time difference exceeds 30 minutes, disable the cancel button functionality
        if ($timeDifference > 30) {
            // Redirect back with a message indicating that the order cannot be canceled
            return redirect()->back()->with('error', 'Sorry, you cannot cancel this order after 30 minutes.');
        }

        // Update the order status and payment status
        $update_in_orders = DB::table('blood_orders')
            ->where('order_id', $order_id)
            ->update(['paymentStatus' => 'return', 'order_status' => 'Cancelled']);

        $update_in_payment = DB::table('payments')
            ->where('order_id', $order_id)
            ->update(['payment_status' => 'return']);

        // Redirect back with a success message
        $mailData=[
            'title'=> 'Blood Booking Cancelation',
            'body' => 'Your Order is Canceled. 
            Your order ID is: ' . $order_id . 
            '. Your bank will credit the amount you paid within three business days.',
        ];

       
        Mail::to(Session::get('user_email'))->send(new Blood_Booking_Confirmation_mail($mailData));
        return redirect()->back()->with('success', 'Order canceled successfully.');


    }
        
            //...................Used for Mail submittion.............//
        
    public function index(){
        $mailData=[
            'title'=> 'We noticed some unethical behebiar from your device!',
            'body' => 'Dont try to over smart we are loking into your phone
                       and sorty notify an date to capture you at your location'
        ];
    
    
        Mail::to('pujasarkarpujasarkar403@gmail.com')->send(new Blood_Booking_Confirmation_mail($mailData));
        // Mail::to('jagannathsarkar212@gmail.com')->send(new Blood_Booking_Confirmation_mail($mailData));
    
        dd('Email send successfully.');
    }

}
