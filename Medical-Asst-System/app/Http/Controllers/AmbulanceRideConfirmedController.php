<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amb_info;
use App\Models\Patient_ambulance;

class AmbulanceRideConfirmedController extends Controller
{
    public function trackAmbulanceLive(Request $request)
    {
        if($request->ajax())
        {
            $amb_coordinates = Amb_info::where('amb_no',$request->amb_no)->get(['amb_loc_lat','amb_loc_lng']);
            $amb_status = Patient_ambulance::where('invoice_no',$request->inv_no)->get(['ride_status']);
            $full_data = compact('amb_coordinates','amb_status');
            return response()->json(['data'=>$full_data]);
        }

        $ptn_rqst_data = Patient_ambulance::where('invoice_no',$request->inv_no)->get();
        $amb_data = Amb_info::where('amb_no',$request->amb_no)->get();
        return view('amb_ptn_ride_accepted',compact('ptn_rqst_data','amb_data'));
    }
}
