<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Patient_ambulance;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\medical_supplies_medical;
use App\Models\medical_supplies_technical;
use App\Models\cart;
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
    $totalcount=cart::count();
    return view('admin_panel.admin_medical_supplies',['medical_supplies_medicals'=>$medical_supplies_medicals],['medical_supplies_technicals'=>$medical_supplies_technicals],compact('totalcount'));
   
   }
   public function input_admin()
   {
    return view('admin_panel.input');
   }
   public function update_admin()
   {
    return view('admin_panel.update');
   }
   public function delete_admin()
   {
    return view('admin_panel.delete');
   }
   public function store(Request $request)
   {
    $data=$request->validate([
        'product_name'=>'required|unique:carts,product_name',
        'product_quantity'=>'required|numeric',
        'product_rate'=>'required|decimal:0,2',
       // 'product_image'=>'required',
        'product_info'=>'required',
        'product_desc'=>'required',
        'user_id'=>'required'
      ]); 
 
               $newProduct=medical_supplies_medical::create($data);
           
  
    return redirect(route("medical_supplies.index"));   
 }

 //-------------------- Ambulance Admin starts here ----------------------------

 public function getAmbAdmin_data(Request $request)
 {

  if($request->ajax())
    {
      if($request->month == "all")
      {
        $data = DB::select("SELECT MONTH(booking_date) AS months,COUNT(*) AS count FROM patient_ambulance WHERE YEAR(booking_date)=$request->year AND ride_status=$request->ride_stat AND amb_type=$request->ride_type GROUP BY MONTH(booking_date)");
      }
      // $data = DB::select("SELECT year(booking_date) as year,count(*) as count from patient_ambulance group BY year(booking_date)");
      else
      {
        $data = DB::select("SELECT MONTH(booking_date) AS months,COUNT(*) AS count FROM patient_ambulance WHERE YEAR(booking_date)=$request->year AND MONTH(booking_date)=$request->month GROUP BY MONTH(booking_date)");
      }
      
      return response()->json(['data'=>$data]);

    }

    $avbl_years = DB::select("SELECT distinct YEAR(booking_date) as years from patient_ambulance ORDER BY booking_date");

    return view('admin_panel.admin_amb_service',compact(array('avbl_years')));

    // return sizeof($avbl_years);
 }
 //-------------------- Ambulance Admin ends here ----------------------------
}
