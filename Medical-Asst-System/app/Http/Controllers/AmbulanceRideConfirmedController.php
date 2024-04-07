<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amb_info;
class AmbulanceRideConfirmedController extends Controller
{
    //
    public function trackAmbulanceLive(Request $request)
    {
        if($request->ajax())
        {
            $amb_coordinates = Amb_info::where('amb_no',$request->amb_no)->get(['amb_loc_lat','amb_loc_lng']);
        
            return response()->json(['data'=>$amb_coordinates]);
        }
        return view('amb_ptn_ride_accepted');
    }
}
