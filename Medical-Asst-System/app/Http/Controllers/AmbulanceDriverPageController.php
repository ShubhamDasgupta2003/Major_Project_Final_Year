<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Amb_info;
use Illuminate\Support\Facades\Http;
class AmbulanceDriverPageController extends Controller
{
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

    public function driverShowRidesAvailable()
    {
        $amb_data = Amb_info::all();
        $len = $amb_data->count();
        $distance = array();
        for($i=0;$i<$len;$i++)
        {   
            $p = 100+$i;
            // $result = $this->fetchDistance(22.916974985080206, 88.43773781147688,$amb_data[$i]['amb_loc_lat'],$amb_data[$i]['amb_loc_lng']);
            // echo $distance;
            // $amb_data->put('distance',$p);
            array_push($distance,$p);
        }
        // print_r($myarr);
        return view('amb_driver_intf',compact('amb_data','distance'));
    }

    public function rideAccepted(Request $request)
    {
        $data = $request;
        return view('amb_driver_ride_accepted_intf',compact('data'));
    }
}
