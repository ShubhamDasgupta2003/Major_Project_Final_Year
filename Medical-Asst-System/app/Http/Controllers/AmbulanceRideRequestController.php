<?php

namespace App\Http\Controllers;

use App\Models\Amb_info;
use App\Models\Hospital_info;
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
    public function getOptimumRides(Request $request)
    {
        $areial_data = DB::select("SELECT amb_name,amb_rate,amb_driver_name,amb_contact,amb_no,amb_loc_lat,amb_loc_lng,ROUND((
            6371 *
            acos(cos(radians($request->ptn_latitude)) * 
            cos(radians(amb_loc_lat)) * 
            cos(radians($request->ptn_longitude) - 
            radians(amb_loc_lng)) + 
            sin(radians($request->ptn_latitude)) * 
            sin(radians(amb_loc_lat)))
         ),1) AS distance FROM amb_info WHERE amb_status = 'active' AND amb_type = '$request->ptn_amb_type' ORDER BY distance LIMIT 5");

        $dist_obj = new AmbulanceDriverPageController;
        $route_dist = array();
        foreach($areial_data as $record)
        {
            $fetch_route_dist = 500;    //Disable this and enable Line:40 during live test

            // $fetch_route_dist = $dist_obj->fetchDistance(22.917007138803726,88.43774841554536,$record->amb_loc_lat,$record->amb_loc_lng); 
            //Calculating the route distance of each ambulance using API

            array_push($route_dist,array('ambulance_name'=>$record->amb_name,'ambulance_rate'=>$record->amb_rate,'driver'=>$record->amb_driver_name,'mobile'=>$record->amb_contact,'distance'=>$record->distance,'route_dist'=>$fetch_route_dist,'amb_no'=>$record->amb_no,'amb_lat'=>$record->amb_loc_lat,'amb_lng'=>$record->amb_loc_lng));
        }
        return $route_dist;
    }
    public function showRideBookingForm(Request $request)
    {
        $cities = City_Table::query()->orderBy('city_ascii')->get();
        $states = states::query()->orderBy('States')->get();
        $district = district::query()->orderBy('District')->get();
        $hospitals = Hospital_info::query()->get(['hos_id','hos_name','hos_address']);
        return view('amb_ptn_booking_intf',compact('cities','states','district','hospitals'));
     
    }
    public function postNewRideRequest(Request $request)
    {
        //Ride status => (000 - Patient posted new ride request)
        //Ride status => (001 - Driver accepted the ride request)
        //Ride status => (011 - Driver started the ride/Cab is running)
        //Ride status => (111 - Ride completed successfully/Ride finished)
        //Ride status => (101 - Driver declined the ride request)
        //Ride status => (010 - Patient cancelled the ride request)

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
            'ptn_zipcode'=>'required|max:7',
            'hos_details'=>'required'
        ]);

        $counter = Patient_ambulance::count();
        $dest_coords = Hospital_info::query()->where('hos_id',$request['hos_id'])->get(['hos_lat','hos_long']);
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
        $ptn_request->dest_latitude = $dest_coords[0]['hos_lat'];
        $ptn_request->dest_longitude = $dest_coords[0]['hos_long'];
        $ptn_request->dest_hos_id = $request['hos_id'];
        $ptn_request->dest_address = $request['hos_details'];
        $ptn_request->patient_name = $request['ptn_name'];
        $ptn_request->patient_age = $request['ptn_age'];
        $ptn_request->patient_gender = $request['ptn_gender'];
        $ptn_request->patient_mobile = $request['ptn_mob'];
        $ptn_request->amb_type = $request['ptn_amb_type'];
        $ptn_request->ride_status = '000';
        $ptn_request->patient_booking_address = $request['ptn_address'];
        $ptn_request->patient_booking_state = $request['ptn_state'];
        $ptn_request->patient_booking_city = $request['ptn_city'];
        $ptn_request->patient_booking_district = $request['ptn_district'];
        $ptn_request->patient_booking_zipcode = $request['ptn_zipcode'];
        if($ptn_request->save())
        {
            $data = $this->getOptimumRides($request);

            $ptn_request->where('invoice_no',$inv_id)->update(['amb_no'=>$data[0]['amb_no'],'amb_current_lat'=>$data[0]['amb_lat'],'amb_current_lng'=>$data[0]['amb_lng']]); //Updating the ambulance no. and coordinates for corrs invoice no

            return view('amb_ptn_waiting_queue',compact('data'));
        }

    }

    public function showAssignedRide(Request $request)
    {
        if($request->ajax())
        {
            $ptn_data = Patient_ambulance::where('user_id','abc123')->where('ride_status','001')->get();
            $amb_data = Amb_info::where('amb_no',$ptn_data[0]->amb_no)->get();
            $full_data = compact('ptn_data','amb_data');
        }
        return response()->json(['data'=>$full_data]);
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
