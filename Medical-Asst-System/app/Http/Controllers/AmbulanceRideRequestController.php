<?php

namespace App\Http\Controllers;

use App\Models\Amb_info;
use App\Models\City_Table;
use App\Models\states;
use App\Models\district;
use Illuminate\Http\Request;
use App\Models\Patient_ambulance;
use App\Http\Controllers\AmbulanceDriverPageController;
use Illuminate\Support\Facades\Http;
use DB;
use Cache;

class AmbulanceRideRequestController extends Controller
{
    public function showAssignedRide()
    {
        $areial_data = DB::select("SELECT amb_no,ROUND((
            6371 *
            acos(cos(radians(22.917007138803726)) * 
            cos(radians(amb_loc_lat)) * 
            cos(radians(88.43774841554536) - 
            radians(amb_loc_lng)) + 
            sin(radians(22.917007138803726)) * 
            sin(radians(amb_loc_lat)))
         ),1) AS distance FROM amb_info ORDER BY distance LIMIT 5");

        return $areial_data;
    }
    public function getOptimumRoute()
    {
        $dist_obj = new AmbulanceDriverPageController;
        $rows = $this->showAssignedRide();
        $route_dist = array();
        foreach($rows as $record)
        {

            array_push($route_dist,array('distance'=>$record->distance,'amb_no'=>$record->amb_no));
        }
        Cache::put('cache_dist',$route_dist);
        return Cache::get('cache_dist');
    }
    public function showRideBookingForm(Request $request)
    {
        return view('amb_ptn_booking_intf');
     
    }
    public function postNewRideRequest(Request $request)
    {
        $data = $this->getOptimumRoute();
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

        $counter = Patient_ambulance::count();
        $ptn_request = new Patient_ambulance;
        $cur_date = date('y-m-d');
        $cur_time = date('H:i:s');

        $inv_id = "AMB".$counter+1;
        $ptn_request->invoice_no = $inv_id;
        $ptn_request->user_id = "abc123";
        $ptn_request->booking_date = $cur_date;
        $ptn_request->booking_time = $cur_time;
        $ptn_request->patient_booking_lat = $request['ptn_latitude'];
        $ptn_request->patient_booking_lng = $request['ptn_longitude'];
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
        if($ptn_request->save())
        {
            return view('amb_ptn_waiting_queue',compact('data'));
        }

    }

    public function checkAmbulanceAvailability(Request $request)
    {
        $amb_query = Amb_info::query();
        $cities = City_Table::query()->orderBy('city_ascii')->get();
        $states = states::query()->orderBy('States')->get();
        $district = district::query()->orderBy('District')->get();

        if($request->ajax())
        {
            $amb_data = $amb_query->where('amb_type','=',$request->type)->where('amb_town','=',$request->city)
            ->orWhere('amb_district','=',$request->dist)
            ->where('amb_type','=',$request->type)->get();

            // return view('amb_check_aval',compact('amb_data'));
            return response()->json(['data'=>$amb_data]);
        }

        return view('amb_check_aval',compact('cities','states','district'));
    }
}
