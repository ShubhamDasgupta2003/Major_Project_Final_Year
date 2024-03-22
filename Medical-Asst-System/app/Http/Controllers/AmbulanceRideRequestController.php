<?php

namespace App\Http\Controllers;

use App\Models\Amb_info;
use Illuminate\Http\Request;
use App\Models\Patient_ambulance;
use Illuminate\Support\Facades\Http;

class AmbulanceRideRequestController extends Controller
{
    public function postNewRideRequest(Request $request)
    {
        $request->validate([
            'ptn_name'=>'required',
            'ptn_age'=>'required|min:1',
            'ptn_gender'=>'required',
            'ptn_mob'=>'required|max:10',
            'ptn_amb_type'=>'required',
            'ptn_address'=>'required',
            'ptn_city'=>'required',
            'ptn_district'=>'required',
            'ptn_state'=>'required',
            'ptn_zipcode'=>'required|max:7'
        ]);

        $ptn_request = new Patient_ambulance;

        $ptn_request->patient_name = $request['ptn_name'];
        $ptn_request->patient_age = $request['ptn_age'];
        $ptn_request->patient_gender = $request['ptn_gender'];
        $ptn_request->patient_mobile = $request['ptn_mob'];
        $ptn_request->amb_type = $request['ptn_amb_type'];
        $ptn_request->patient_booking_address = $request['ptn_address'];
        $ptn_request->patient_booking_state = $request['ptn_state'];
        $ptn_request->patient_booking_city = $request['ptn_city'];
        $ptn_request->patient_booking_district = $request['ptn_district'];
        $ptn_request->patient_booking_zipcode = $request['ptn_zipcode'];
    }

    public function checkAmbulanceAvailability(Request $request)
    {
        $request->validate([
            'ptn_amb_type'=>'required',
            'ptn_address'=>'required',
            'ptn_city'=>'required',
            'ptn_district'=>'required',
            'ptn_state'=>'required',
            'ptn_zipcode'=>'required|max:7'
        ]);

        $avlAmbulance = Amb_info::where([['amb_type','=',$request['ptn_amb_type']],['amb_town','=',$request['ptn_city']],
        ['amb_state','=',$request['ptn_state']],
        ['amb_district','=',$request['ptn_district']],
        ['amb_loc_pincode','=',$request['ptn_zipcode']]]);
    }
}
