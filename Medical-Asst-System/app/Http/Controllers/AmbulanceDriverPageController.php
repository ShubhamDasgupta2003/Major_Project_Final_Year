<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Amb_info;
use App\Models\Patient_ambulance;
use Illuminate\Support\Facades\Http;
class AmbulanceDriverPageController extends Controller
{
    public function getPatientData()
    {
        $ptn_data = Patient_ambulance::all();
        return response()->json(['ptn_data'=>$ptn_data]);
    }
    public function getAmbulanceData()
    {
        $amb_data = Amb_info::all();
        return response()->json(['amb_data'=>$amb_data]);
    }
    public function fetchDistance($org_lat,$org_lng,$dest_lat,$dest_lng)
    {
            $response = Http::get('https://api.distancematrix.ai/maps/api/distancematrix/json?origins='.$org_lat.','.$org_lng.'&destinations='.$dest_lat.','.$dest_lng.'&key=NZIAp1JWj66LHIiRZx70XoC2fOvLIfPd9EteugzPfS6dRcosnCG2SKOTfh9DESuG');
            $response = (array)json_decode($response);
            $response = $response['rows'];
            $response = (array)$response[0]->elements;
            $response = (array)$response[0]->distance->text;
            $distance_val = $response[0];
            return $distance_val;
        
    }

    public function driverShowRidesAvailable(Request $request)
    {
        if($request->ajax())
        {
            $amb = Amb_info::where('amb_no',$request->amb_id)->update(['amb_loc_lat'=>$request->lat,'amb_loc_lng'=>$request->lng]); //Updating the coordinates of ambulance whenever it changes using ajax
            
            $newPatientRequest = Patient_ambulance::where('amb_no',$request->amb_id)->where('ride_status','000')->get(); //Fetching details of new ride request posted on database using ajax

            return response()->json(['data'=>$newPatientRequest]);
        }

        $amb_no_key = session('amb_id');
        $amb_record = Amb_info::where('amb_no','=',$amb_no_key)->first();

        return view('amb_driver_intf',compact('amb_record'));
    }

    public function rideAccepted(Request $request)
    {
        $data = "hello";
        return view('amb_driver_ride_accepted_intf',compact('data'));
    }
}
