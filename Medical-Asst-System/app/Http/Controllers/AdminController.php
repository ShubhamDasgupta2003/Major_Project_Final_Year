<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Patient_ambulance;
use App\Models\Payments_records;
use App\Models\Amb_info;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\medical_supplies_medical;
use App\Models\User_info;
use App\Models\medical_supplies_technical;
use App\Models\medical_supplies_order;
use App\Models\cart;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use Illuminate\contract\Mailer;
class AdminController extends Controller
{
    public function index()
   {
    return view('admin_panel.index');
   }
   public function admin_supplies()
   {
    $medical_supplies_medicals=medical_supplies_medical::all();
    $medical_supplies_technicals=medical_supplies_technical::all();
    $currentMonthOrdersCount = medical_supplies_order::whereMonth('created_at', now()->month)->count();
    $currentMonthOrders = medical_supplies_order::select('product_rate')
    ->whereRaw('MONTH(created_at) = MONTH(NOW())')
    ->get();
    $totalProductrate = $currentMonthOrders->sum('product_rate');
    $userCount = User_info::count();
    $totalcount=cart::count();
    return view('admin_panel.admin_medical_supplies',['medical_supplies_medicals'=>$medical_supplies_medicals,'userCount' => $userCount,'totalProductrate' => $totalProductrate,'currentMonthOrdersCount'=> $currentMonthOrdersCount ],compact('totalcount'));
   
   }
   public function order()
   {
    $orders=medical_supplies_order::all();
 
    return view('admin_panel.order',['orders'=>$orders]);
   }
   public function adminorderdelete(medical_supplies_order $order)
   {
    $userEmail = $order->user_email;
    $username = $order->user_name;
    $order->delete();
    $orders=medical_supplies_order::all();
    



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

 
    return view('admin_panel.order',['orders'=>$orders]);
    
   }
   public function input_admin()
   {
    return view('admin_panel.input');
   }
   public function update_admin(medical_supplies_medical $medical_supplies_medical )
   {
    return view('admin_panel.update',['medical_supplies_medical'=>$medical_supplies_medical]);
   }
   public function updated_admin(medical_supplies_medical $medical_supplies_medical , Request $request)
   {
    $data=$request->validate([
        'product_id'=>'required',
        'category'=>'required',
        'product_name'=>'required',
        'product_rate'=>'required',
        'product_image' =>'required',
        'product_para'=>'required',
        'product_desc'=>'required',
        'product_makers'=>'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2148',
    ]); 

    $medical_supplies_medical->update($data);



  // Get the uploaded file
  $product_image = $request->file('image');

  // Move the uploaded file to the desired location with its original name
  $product_image->move(public_path('pictures'), $product_image->getClientOriginalName());
         

  return redirect(route("admin_panel.admin_medical_supplies"));  
   }
   public function delete_admin(medical_supplies_medical $medical_supplies_medical)
   {
    $medical_supplies_medical->delete();
    return redirect(route("admin_panel.admin_medical_supplies"));  
   }
   public function supplies()
   {
    $medical_supplies_medicals = medical_supplies_medical::all();
    return view('admin_panel.supplies',['medical_supplies_medicals'=>$medical_supplies_medicals]); 
  }
   
  public function suppliesu(medical_supplies_medical $medical_supplies_medical,Request $request)
   {
   
    
    $data=$request->validate([
      'id'=>'required',
      'quantity'=>'required|numeric'
    ]); 

     $medical_supplies_medical->update($data);

return redirect(route("admin_panel.supplies")); 
  }
   public function store(Request $request)
   {
    $data=$request->validate([
        'product_id'=>'required',
        'category'=>'required',
        'product_name'=>'required|unique:carts,product_name',
        'product_rate'=>'required|decimal:0,2',
        'product_image' => 'required',
        'product_para'=>'required',
        'product_desc'=>'required',
        'product_makers'=>'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
      ]); 
  

    // Get the uploaded file
    $product_image = $request->file('image');

    // Move the uploaded file to the desired location with its original name
    $product_image->move(public_path('pictures'), $product_image->getClientOriginalName());
    try{
      $newProduct=medical_supplies_medical::create($data);
     }catch(Exception $e)
     {
     
      return redirect(route("admin_panel.admin_medical_supplies"))  ;   
     }
              
           
  
    return redirect(route("admin_panel.admin_medical_supplies"));   
 }

 //-------------------- Ambulance Admin starts here ----------------------------

 public function getAmbAdmin_data(Request $request)
 {

  // AJAX request for rides report db queries

  if($request->ajax() && $request->qtype=="ride_report")
    {
      if($request->month == "all")
      {
        $data = DB::select("SELECT MONTH(booking_date) AS months,COUNT(*) AS count FROM patient_ambulance WHERE YEAR(booking_date)=$request->year AND ride_status=$request->ride_stat AND amb_type=$request->ride_type GROUP BY MONTH(booking_date)");
      }
      else
      {
        $data = DB::select("SELECT MONTH(booking_date) AS months,COUNT(*) AS count FROM patient_ambulance WHERE YEAR(booking_date)=$request->year AND MONTH(booking_date)=$request->month GROUP BY MONTH(booking_date)");
      }
      
      return response()->json(['data'=>$data]);

    }

    // AJAX request for income report db queries

    else if($request->ajax() && $request->qtype=="income_report")
    {
      if($request->month=="all")
      {
        $data = DB::select("SELECT SUM(amount) AS amount,MONTH(payment_date) AS months FROM payments WHERE order_id LIKE 'AMB%' AND payment_status=$request->p_stat AND YEAR(payment_date)=$request->year GROUP BY MONTH(payment_date)");
      }
      else
      {
        $data = DB::select("SELECT SUM(amount) AS amount,MONTH(payment_date) AS months FROM payments WHERE order_id LIKE 'AMB%' AND payment_status=$request->p_stat AND YEAR(payment_date)=$request->year AND MONTH(payment_date)=$request->month GROUP BY MONTH(payment_date)");
      }
      return response()->json(['data'=>$data]);
    }
    $cur_month_no = date("m");
    $avbl_years = DB::select("SELECT distinct YEAR(booking_date) as years from patient_ambulance ORDER BY booking_date");
    $reg_Drivers = DB::select("SELECT COUNT(*) as count FROM amb_info");
    $cur_month_income = DB::select("SELECT SUM(amount) as amount FROM payments WHERE MONTH(payment_date)=$cur_month_no");
    $success_rides = DB::select("SELECT COUNT(*) AS count FROM patient_ambulance WHERE ride_status=111");
    return view('admin_panel.admin_amb_service',compact(array('avbl_years','reg_Drivers','cur_month_income','success_rides')));
   

    // return sizeof($avbl_years);
 }
 //-------------------- Ambulance Admin ends here ----------------------------
}
