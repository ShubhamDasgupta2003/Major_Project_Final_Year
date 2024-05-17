<?php

namespace App\Http\Controllers;
use App\Models\HcsEmployeeTableModel;
use App\Models\Hcs_Order;
use App\Models\Hcs_admin;
use App\Models\Hcs_user_rating;
use App\Models\Payments_records;
use App\Models\User_info;
use Illuminate\Http\Request;
use Mail;
use App\Mail\Hcs_emp_booking_mail;
use App\Mail\Hcs_emp_msg_mail;
use App\Mail\Hcs_emp_rej_msg_mail;
use App\Mail\Hcs_user_cancel_order_mail;
use App\Mail\Hcs_mail_emp_booking_for_emp;
use App\Mail\Hcs_mail_admin_emp_request_accept;
use App\Mail\Hcs_mail_admin_emp_request_not_accept;

class HcsController extends Controller
{

    public function emp_register(Request $request){
        $emp_table = new HcsEmployeeTableModel;
        $emp_table->emp_name = $request->input('emp_name');
        $emp_table->emp_dob = $request->input('emp_dob');
        $emp_table->emp_gender = $request->input('emp_gender');
        $emp_table->emp_type = $request->input('emp_type');
        $emp_table->emp_email = $request->input('emp_email');
        $emp_table->password = $request->input('password');
        $emp_table->emp_contact_num = $request->input('emp_contact_num');
        $emp_table->emp_address = $request->input('emp_address');
        $emp_table->emp_loc_lat = $request->input('emp_loc_lat');
        $emp_table->emp_loc_long = $request->input('emp_loc_long');
        $emp_table->emp_status = "Free";
        $emp_table->emp_salary = $request->input('emp_salary');
        $emp_table->emp_govt_id = $request->input('emp_govt_id');
        $emp_table->emp_verification = "Pending";
        $emp_table->rating_value = 0;
        $emp_table->emp_photo_path = str_replace('public/', '', $request->file('photo')->store("public/hcs_emp_files"));
        $emp_table->emp_govt_id_path = str_replace('public/', '', $request->file('govt_id_copy')->store("public/hcs_emp_files"));
        $emp_table->emp_bio_data_path = str_replace('public/', '', $request->file('bio_data')->store("public/hcs_emp_files"));
        $emp_table->save();
        return redirect("/hcs_emp_waitting");
        

        
    }
    public function aya_home(Request $request)
    {   if($request->ajax())
        {
            $adds = $request->full_address;
            $lat = $request->lat;
            $lng = $request->lng;
            $uid = $request->uid;
            $data = compact('adds','lat','lng','uid');
            //Update users table with requested address and return
            User_info::where('user_id',$uid)->update(['user_lat_in_use'=>$lat,'user_long_in_use'=>$lng,'user_formatted_address'=>$adds]);
            return response()->json(['data'=>$data]);
        }
        if (!session()->has('user_name')) {
            // Set alert message and type
            $alertMessage = 'Please login to access this page.';
            $alertType = 'warning';
    
            // Redirect to login page with alert message
            return redirect()->route('user_login')->with(compact('alertMessage', 'alertType'));
        } else {
            $employess = HcsEmployeeTableModel::where('emp_verification', 'Done')->where('emp_status', "Free")->get();
            $userdatas = Hcs_order::where('user_id', session()->get('user_id'))->get();
            $userinfo = User_info::where('user_id', session()->get('user_id'))->first();
    
            // Create an associative array with data from both tables
            $data = [
                'employees' => $employess,
                'userdatas' => $userdatas,
                'userinfo' =>  $userinfo,
                'user_adds'
            ];
            // Pass the associative array to the view
            return view("hcs_home_aya", $data);
        }
    }
     //Employee Admin Section
    public function show_emp_admin_intf(){
            if(session()->has('emp_admin_name')){
            $orders= Hcs_Order::where('order_status',"Pending")->get();
            $allorders = Hcs_Order::all();
            $data = [
                'orders' => $orders,
                'allorders' => $allorders
            ];   
        return view("hcs_emp_admin_intf")->with($data);}
    }
    public function hcs_emp_admin_all_orders(){
        if(session()->has('emp_admin_name')){
            $orders= Hcs_Order::all(); 
            $data = compact('orders');    
        return view("hcs_emp_admin_all_orders")->with($data);}
    }
    public function hcs_emp_admin_completed_orders(){
        if(session()->has('emp_admin_name')){
            $orders= Hcs_Order::where('order_status',"Completed")->get();  
            $data = compact('orders');    
        return view("hcs_emp_admin_completed_orders")->with($data);}
    }
    public function hcs_emp_admin_ongoing_order(){
        if(session()->has('emp_admin_name')){
            $orders= Hcs_Order::where('order_status',"Ongoing")->get();  
            $data = compact('orders');    
        return view("hcs_emp_admin_ongoing_order")->with($data);}
    }
    public function hcs_emp_admin_otp_ongoing_order(Request $request){
        if(session()->has('emp_admin_name')){
            // Validate the input
            $request->validate([
                'otp' => 'required|numeric', // Adjust validation rules as needed
            ]);
    
            $otp = $request->input('otp');
            $order = Hcs_Order::where('order_status', 'Ongoing')->where('otp', $otp)->first();
            
            if($order){
                // Update the order status
                $order->update(['order_status' => 'Completed']);
                HcsEmployeeTableModel::where('emp_id', $order->emp_id)->update([
                    'emp_status' => 'Free'
                ]);
                return redirect()->route('hcs_emp_admin_ongoing_order')->with('success', 'Order completed successfully.');
            } else {
                // Invalid OTP
                return redirect()->route('hcs_emp_admin_ongoing_order')->with('failed', 'OTP is incorrect.');
            }    
       }
    }
    //Rating Section
    public function rating_index(){
        return view("hcs_add_rating");
    }
    public function add_rating(Request $request){
        $table = new Hcs_user_rating;
        $table->rating_comment = $request->input('rating_comment');
        $table->user_id = session()->get('user_id');
        $table->user_name = session()->get('user_name');
        $table->emp_id = $request->input('emp_id');
        $table->rating_value = $request->input('rate'); // Correctly retrieve rating_value from the request
        $table->save();

        // Inside your controller or wherever you need to perform this operation
        $ratings = Hcs_user_rating::where('emp_id', $request->input('emp_id'))->get();
        $totalRatingValue = $ratings->sum('rating_value');
        $count = $ratings->count();

        // Calculate the average rating value
        $averageRating = $count > 0 ? number_format($totalRatingValue / $count, 1) : 0.0;
        HcsEmployeeTableModel::where('emp_id', $request->input('emp_id'))->update(['rating_value' => $averageRating]);
        // Now $averageRating contains the average rating value

        return redirect("/");
    }
    public function show_rating(Request $request){
        $ratings= Hcs_user_rating::all();
        $data = compact('ratings');
        return view("hcs_show_rating")->with($data);
    }

    public function sup_admin_index(){
        return view("hcs_admin_login");
    }
    public function sup_admin_login(Request $request){
       $user=Hcs_admin::where('admin_email',$request->input('admin_email'))->where('admin_password',$request->input('admin_password'))->first();
       if($user){
            $request->session()->put('hcs_admin_name',$user->admin_name);
            return redirect('hcs_admin');
        }
        else{
          return redirect('hcs_admin_login')->with('failed','Email/Password is incorrect.');
        }
    }
    public function sup_admin_logout(Request $request){
        session()->forget('hcs_admin_name');
        return redirect("hcs_admin_login");
    }
    public function admin_intf(Request $request){
        if(session()->has('hcs_admin_name')){
        $employess= HcsEmployeeTableModel::where('emp_verification',"Pending")->get(); 
        $data = compact('employess');    
        return view("hcs_admin_intf")->with($data);
    }
        else
        {return redirect("hcs_admin_login");}
            
    }
    public function update_nemp_data($emp_id){
        $employess= HcsEmployeeTableModel::where('emp_id',$emp_id)->update(['emp_verification' => 'Done']);
        $empdata= HcsEmployeeTableModel::where('emp_id', $emp_id)->first();
        Mail::to($empdata->emp_email)->send(new Hcs_mail_admin_emp_request_accept($empdata));
        return redirect('hcs_admin');
    }
    public function delete_nemp_data($emp_id){
        
        $empdata= HcsEmployeeTableModel::where('emp_id', $emp_id)->first();
        Mail::to($empdata->emp_email)->send(new Hcs_mail_admin_emp_request_not_accept($empdata));
        $employess= HcsEmployeeTableModel::where('emp_id',$emp_id)->delete();
        return redirect('hcs_admin');
    }
    //Employee Admin
    public function emp_logout(Request $request){
        session()->forget('emp_admin_name');
        session()->forget('emp_admin_id');
        session()->forget('is_adm_login');
        return redirect("login");
        }
        public function reg_form_index(){
            return view("hcs_booking_form");
        }
        public function user_register(Request $request){
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
            $order_id = $rowCount;
            $order_table->order_id = $order_id;
            $order_table->user_id = session()->get('user_id');
            $order_table->emp_id =$request->input('emp_id');
            $order_table->order_type = "A";
            $order_table->name = $request->input('name');
            $order_table->gender = $request->input('gender');
            $order_table->contact_num = $request->input('contact_num');
            $order_table->land_mark = $request->input('land_mark');
            $order_table->address = $request->input('address');
            $order_table->district = $request->input('district');
            $order_table->state = $request->input('state');
            $order_table->pincode = $request->input('pincode');
            $order_table->order_status = "Pending";
            $order_table->payment_status = "No";
            $order_table->order_loc_lat = 0;
            $order_table->order_loc_long = 0;
            $order_table->otp = rand(0000,9999);
            $order_table->save();
            HcsEmployeeTableModel::where('emp_id',$request->input('emp_id'))->update(['emp_status' => 'Busy']);
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
            $empdata= HcsEmployeeTableModel::where('emp_id', $userdata->emp_id)->first();
            Mail::to(session()->get("user_email"))->send(new Hcs_emp_booking_mail($userdata,$empdata));
            Mail::to($empdata->emp_email)->send(new Hcs_mail_emp_booking_for_emp($userdata,$empdata));   
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
        public function hcs_emp_msg_index(){
            return view("hcs_emp_msg");
        } 
        public function hcs_emp_msg(Request $request)
        {
            $userdata = Hcs_order::where('order_id', $request->input('order_id'))->first();
            Hcs_order::where('order_id', $request->input('order_id'))->update(['order_status' => 'Ongoing']);
            HcsEmployeeTableModel::where('emp_id', $userdata->emp_id)->update([
                'emp_status' => 'Busy'
            ]);
        
            if (!$userdata) {
                // Handle case where order data is not found
                return redirect()->back()->with('error', 'Order not found');
            }
        
            $user_id = $userdata->user_id;
        
            // Retrieve user info
            $userinfo = User_info::where('user_id', $user_id)->first();
        
            if (!$userinfo) {
                // Handle case where user info is not found
                return redirect()->back()->with('error', 'User information not found');
            }
        
            $msg = $request->input('msg');
        
            Mail::to($userinfo->user_email)->send(new Hcs_emp_msg_mail($userdata, $msg));

        
            return redirect("show_emp_admin_intf");
        }
        public function hcs_emp_rej_msg_index(){
            return view('hcs_emp_rej_msg');
        }
        public function hcs_emp_rej_msg(Request $request){
            $userdata = Hcs_order::where('order_id', $request->input('order_id'))->first();
            if (!$userdata) {
                // Handle case where order data is not found
                return redirect()->back()->with('error', 'Order not found');
            }
        
            $user_id = $userdata->user_id;
        
            // Retrieve user info
            $userinfo = User_info::where('user_id', $user_id)->first();
        
            if (!$userinfo) {
                // Handle case where user info is not found
                return redirect()->back()->with('error', 'User information not found');
            }
        
            $msg = $request->input('msg');
            Hcs_order::where('order_id', $request->input('order_id'))->update([
                'order_status' => 'Canceled',
                'rej_msg' => $msg
            ]);
            HcsEmployeeTableModel::where('emp_id', $userdata->emp_id)->update([
                'emp_status' => 'Free'
            ]);
        
            Mail::to($userinfo->user_email)->send(new Hcs_emp_rej_msg_mail($userdata, $msg));

        
            return redirect("show_emp_admin_intf");
        }
        public function user_cancel_order(Request $request){
        Hcs_order::where('order_id', $request->input('order_id'))->update(['order_status' => 'Canceled']);
        $userdata= Hcs_order::where('order_id',$request->input('order_id'))->first(); 
        Mail::to(session()->get("user_email"))->send(new Hcs_user_cancel_order_mail($userdata));     
        return redirect("aya");
        }
}

