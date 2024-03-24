<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient_booking_info;
use App\Models\Hospital_info;
use Carbon\Carbon;

class PatientController extends Controller
{
        public function HosInfo(Request $request , $id){
            $hos_info= Hospital_info::findOrfail($id);
            return view('hos_form')->with('hos_info', $hos_info);
        }

    public function StoreData(Request $request,$hos_info)
    {
        // $request->validate([
            // "pnt_id"=>"required|max:30|",
            // "hos_id"=>"required|max:30|",
            // "hos_name"=>"required|max:60|",
            // // "user_id"=>"required|max:30|",
            // "pnt_first_name"=>"required|max:30|",
            // "pnt_last_name"=>"required|max:30|",
            // "pnt_contactno"=>"required|max:10",
            // "pnt_age"=>"required|max:3",
            // "pnt_gender"=>"required",
            // // "pnt_gender"=>"required|Rule::in(['male','female'])",
            // "pnt_dob"=>"required",
            // "pnt_email"=>"required|email",
            // "pnt_adhr"=>"required",
            // "pnt_address"=>"required",
            // "pnt_district"=>"required",
            // "pnt_city"=>"required",
            // "pnt_pincode"=>"required",
            // "pnt_booking_date"=>"required",
            // "pnt_booking_timestamp"=>"required",
            // "pnt_booking_deadline_timestamp"=>"required",
            // "pnt_bed_charge"=>"required",
            // // "pnt_booking_status"=>"required",
        // ]);
        $pnt = new Patient_booking_info;


        $randomNumber = str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
        $patient_id = "PNT".$randomNumber;


        $randomNumber = str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
        $user_id = "USR".$randomNumber;
        
        $hos_id_storage = $hos_info;
        
        
        $hos_info_all= Hospital_info::where('hos_id',$hos_info)->first();

        if ($hos_info_all) {

            $hospital_id = $hos_info_all->hos_id;
            $hospital_name = $hos_info_all->hos_name;
            $hospital_bed_charge = $hos_info_all->hos_bed_charge;


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
        $pnt->pnt_booking_date = now();
        // $pnt->pnt_booking_timestamp = now();
        $pnt_booking_timestamp = Carbon::now()->timestamp;
        $deadline = Carbon::createFromTimestamp($pnt_booking_timestamp)->addHours(4)->timestamp;
        // $deadline = Carbon::parse($pnt_booking_timestamp)->addHours(4);
        $pnt->pnt_booking_timestamp = $pnt_booking_timestamp;
        $pnt->pnt_booking_deadline_timestamp = $deadline;
        $pnt->pnt_bed_charge = $hospital_bed_charge;
        $pnt->pnt_booking_status = "Applied";
        $pnt->save();
        return redirect('/hos_confirm');
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