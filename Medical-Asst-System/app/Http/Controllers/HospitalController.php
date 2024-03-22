<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital_info;
use Illuminate\Support\Facades\Http;
use App\Models\Patient_booking_info;
class HospitalController extends Controller
{
    public function GetHospitalData(){
        $hos_data= Hospital_info::all();
        // return response()->json(['hos_data'=>$hos_data]);
        // $hospital_data= compact('hospital_info');
        $data = compact('hos_data');
        return view('hos_main')->with($data);
    }

    public function DisplayHosData(Request $request , $id){
        return view('hos_form')->with('id', $id); 
    }
}
