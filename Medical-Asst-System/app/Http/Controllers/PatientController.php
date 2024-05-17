<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient_booking_info;
use App\Models\Hospital_info;
use Carbon\Carbon;
use App\Models\Payment;

class PatientController extends Controller
{
        public function HosInfo(Request $request , $id){
            $hos_info= Hospital_info::findOrfail($id);
            return view('hos_form')->with('hos_info', $hos_info);
        }

    public function StoreData(Request $request,$hos_info)
    {
        // dd($request->all());
        $request->validate([
            // "pnt_id"=>"required",
            // "hos_id"=>"required",
            // "hos_name"=>"required",
            // "user_id"=>"required",
            "pnt_first_name"=>"required",
            "pnt_last_name"=>"required",
            "pnt_contactno"=>"required",
            "pnt_age"=>"required",
            "pnt_gender"=>"required",
            // "pnt_gender"=>"required|Rule::in(['male','female'])",
            "pnt_dob"=>"required",
            "pnt_email"=>"required|email",
            "pnt_adhr"=>"required",
            "pnt_address"=>"required",
            "pnt_district"=>"required",
            "pnt_city"=>"required",
            "pnt_pincode"=>"required",
            // "pnt_booking_date"=>"required",
            // "pnt_booking_timestamp"=>"required",
            // "pnt_booking_deadline_timestamp"=>"required",
            // "pnt_bed_charge"=>"required",
            // "pnt_booking_status"=>"required",
        ]);
        $pnt = new Patient_booking_info;
        
        
        
        $randomNumber = str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
        $patient_id = "PNT".$randomNumber;
        
        
        $randomNumber = str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
        $user_id = "USR".$randomNumber;
        // $user_id = session()->get('user_id');
        
        $hos_id_storage = $hos_info;
        
        // dd($hos_id_storage);
        // $hos_info_all= Hospital_info::where('hos_id',$hos_id_storage)->get();
        $hos_info_all = Hospital_info::where('hos_id', '=', $hos_id_storage)->first();
        // dd($hos_info_all);
        
        if ($hos_info_all) {

            $hospital_id = $hos_info_all->hos_id;
            $hospital_name = $hos_info_all->hos_name;
            $hospital_bed_charge = $hos_info_all->hos_bed_charge;
            $hos_male_bed = $hos_info_all->hos_male_bed_available;
            $hos_female_bed = $hos_info_all->hos_female_bed_available;


            // session variable created 
            session(['hos_id' => $hospital_id]);
            session(['pnt_id' => $patient_id]);

        } else {
            
            return response()->json(['message' => 'Data not found'], 404);
        }


        $pnt->pnt_id = $patient_id;
        $pnt->hos_id = $hospital_id;
        $pnt->hos_name = $hospital_name;
        $pnt->user_id = $user_id;
        $pnt->pnt_first_name = $request['pnt_first_name'];
        $pnt->pnt_last_name = $request['pnt_last_name'];
        $pnt->pnt_contactno = $request['pnt_contactno'];
        $pnt->pnt_age = $request['pnt_age'];
        $pnt->pnt_gender = $request['pnt_gender'];
        $pnt->pnt_dob = $request['pnt_dob'];
        $pnt->pnt_email = $request['pnt_email'];
        $pnt->pnt_adhr = $request['pnt_adhr'];
        $pnt->pnt_address = $request['pnt_address'];
        $pnt->pnt_district = $request['pnt_district'];
        $pnt->pnt_city = $request['pnt_city'];
        $pnt->pnt_pincode = $request['pnt_pincode'];
        // $pnt->pnt_booking_date = now();
        $currentDateTime = Carbon::now()->toDateTimeString();
        $pnt->pnt_booking_date = $currentDateTime;
        // $pnt->pnt_booking_timestamp = now();
        $pnt_booking_timestamp = Carbon::now()->timestamp;
        $deadline = Carbon::createFromTimestamp($pnt_booking_timestamp)->addHours(4)->timestamp;
        // $deadline = Carbon::parse($pnt_booking_timestamp)->addHours(4);
        $pnt->pnt_booking_timestamp = $pnt_booking_timestamp;
        $pnt->pnt_booking_deadline_timestamp = $deadline;
        $pnt->pnt_bed_charge = $hospital_bed_charge;
        $pnt->pnt_booking_status = "Admitted";
        
        $pnt->save();
        // dd([
        //     'pnt_id' => $pnt->pnt_id,
        //     'hos_id' => $pnt->hos_id,
        //     'hos_name' => $pnt->hos_name,
        //     'user_id' => $pnt->user_id,
        //     'pnt_first_name' => $pnt->pnt_first_name,
        //     'pnt_last_name' => $pnt->pnt_last_name,
        //     'pnt_contactno' => $pnt->pnt_contactno,
        //     'pnt_age' => $pnt->pnt_age,
        //     'pnt_gender' => $pnt->pnt_gender,
        //     'pnt_dob' => $pnt->pnt_dob,
        //     'pnt_email' => $pnt->pnt_email,
        //     'pnt_adhr' => $pnt->pnt_adhr,
        //     'pnt_address' => $pnt->pnt_address,
        //     'pnt_district' => $pnt->pnt_district,
        //     'pnt_city' => $pnt->pnt_city,
        //     'pnt_pincode' => $pnt->pnt_pincode,
        //     'pnt_booking_date' => $pnt->pnt_booking_date,
        //     'pnt_booking_timestamp' => $pnt_booking_timestamp,
        //     'pnt_booking_deadline_timestamp' => $deadline,
        //     'pnt_bed_charge' => $pnt->pnt_bed_charge,
        //     'pnt_booking_status' => $pnt->pnt_booking_status
        // ]);
        // echo $pnt;
        
        // $newProduct=Patient_booking_info::create($pnt);
//  updating bed count of hospital 
        if($request['pnt_gender']=="male"){
            Hospital_info::where('hos_id',$hospital_id)->update([
                'hos_male_bed_available' => $hos_male_bed -1 
            ]);
        }else if($request['pnt_gender']=="female"){
            Hospital_info::where('hos_id',$hospital_id)->update([
                'hos_female_bed_available' => $hos_female_bed -1 
            ]);
        }
       

        // $u= mt_rand(1000000, 9999999);
        // $randomNumber= mt_rand(1000000, 9999999);
        // $currentTime = Carbon::now()->toTimeString();
        // $status="completed";
        // $t="Hospital Bed Service";
        // $currentDateIndia = Carbon::now('Asia/Kolkata')->toDateString();
        // $newProduct = Payment::create([
        //         'payment_id'  => $randomNumber,
        //         'order_id' => $u,
        //         'user_id' => session()->get('user_id'),
        //         'service_type' => $t,
        //         'payment_time' =>  $currentTime,
        //         'payment_date' => $currentDateIndia,
        //          'amount'=> $hospital_bed_charge,
        //          'payment_status' =>  $status,
            
        //     ]);
            //    return view('hos_payment',['order_id'=>$u,'amount'=>$hospital_bed_charge,'service_type'=>$t]);
            // return redirect('/order')->with(['order_id' => $u, 'amount' => $hospital_bed_charge, 'service_type' => $t]);



        // return redirect('/hos_confirm')->with('order_id',$u,'amount',$hospital_bed_charge,'service_type',$t);
        return redirect('/hos_confirm');
        // ->with([
        //     'order_id' => $u,
        //     'amount' => $hospital_bed_charge,
        //     'service_type' => $t
        // ]);
    }
    public function exit()
    {
        $u= mt_rand(1000000, 9999999);
        $t="Hospital Bed Service";
        $hospital_bed_charge= "300";
      return view('hos_payment')->with([
        'order_id' => $u,
        'amount' => $hospital_bed_charge,
        'service_type' => $t
    ]);
    }
public function order(Request $request){




//  $u= mt_rand(1000000, 9999999);;
        $randomNumber= mt_rand(1000000, 9999999);;
        $currentTime = Carbon::now()->toTimeString();
        $status="completed";
        // $t="Hospital Bed Service";
        $currentDateIndia = Carbon::now('Asia/Kolkata')->toDateString();
        $newProduct = Payment::create([
                'payment_id'  => $randomNumber,
                'order_id' => $u,
                'user_id' => session()->get('user_id'),
                'service_type' => $t,
                'payment_time' =>  $currentTime,
                'payment_date' => $currentDateIndia,
                 'amount'=> $hospital_bed_charge,
                 'payment_status' =>  $status,
            
            ]);
            // return view('welcome');
}
    public function RedirectConfirm(){
        $hos_id = session('hos_id');
        $pnt_id = session('pnt_id');
        
        
        
        $hos_info_all= Hospital_info::where('hos_id',$hos_id)->first();
        $pnt_info_all= Patient_booking_info::where('pnt_id',$pnt_id)->first();
        return view('hos_confirmation')->with([
            'hos_info_all' => $hos_info_all,
            'pnt_info_all' => $pnt_info_all
        ]);
        // $deadline_timestamp=$pnt_info_all->pnt_booking_deadline_timestamp;
        // $deadline_dateTime = Carbon::createFromTimestamp($deadline_timestamp)->toDateTimeString();
    }
}

// $newProduct = Payment::create([
//     'payment_id'  => $randomNumber,
//     'order_id' => $u,
//     'user_id' => session()->get('user_id'),
//     'service_type' => $t,
//     'payment_time' =>  $currentTime,
//     'payment_date' => $currentDateIndia,
//      'amount'=> $p,
//      'payment_status' =>  $status,

// ]);
//    return view('medical_supplies.proceedtopay',['order_id'=>$u,'amount'=>$p,'service_type'=>$t]);