<?php

namespace App\Http\Controllers;

use App\Models\User_info;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Amb_info;
use App\Models\Patient_ambulance;

use App\Mail\Amb_confirm_mail;
use Illuminate\Support\Facades\Mail;
use Illuminate\contract\Mailer;
use App\Mail\MailNotify;

use Illuminate\Support\Facades\Http;
use Session;
class AmbulanceDriverPageController extends Controller
{

    public function getPatientData()
    {
        $ptn_data = Patient_ambulance::where('ride_status','000');
        return response()->json(['ptn_data'=>$ptn_data]);
    }
    public function getAmbulanceData()
    {
        $amb_data = Amb_info::where('amb_status','active')->get();
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
        //Function executes when driver clicks on Accept ride button on Driver-intf
        //Updating the ride status code and generating a 4-digit otp
        
        $otp = rand(1000,9999);
        $amb_no_key = session('amb_id');

        $inv_id = Patient_ambulance::where('amb_no',$amb_no_key)->where('ride_status','000')->get(['invoice_no']);
        

        $ride_status_update = Patient_ambulance::where('amb_no',$amb_no_key)->where('ride_status','000')->update(['ride_status'=>'001','otp'=>$otp]);
        


        if($request->ajax())
        {
            $amb = Amb_info::where('amb_no',$request->amb_id)->update(['amb_loc_lat'=>$request->lat,'amb_loc_lng'=>$request->lng]); //Updating the coordinates of ambulance whenever it changes using ajax
            return response()->json(['data'=>$amb]);
        }


        $ride_info = Patient_ambulance::where('amb_no',$amb_no_key)->where('ride_status','001')->get();

        $amb_info = Amb_info::where('amb_no',$ride_info[0]->amb_no)->get();

        $patient_email = User_info::where('user_id',$ride_info[0]->user_id)->get('user_email');

        //Sending confirmation email to respective user
        //Modify emails.amb_confirm_mail file for email body
        $data["email"] = $patient_email[0]->user_email;

        $data["title"] = "From Emergency Medical Assistance System";

        $data["body"] = "This is Demo";

        $data["ptn_info"]=$ride_info;
        $data["amb_info"]=$amb_info;
        Mail::send('emails.amb_confirm_mail', $data, function($message)use($data) {

            $message->to($data["email"])

                    ->subject($data["title"]);

        });

        $alert = "";
        return view('amb_driver_ride_accepted_intf',compact('ride_info','inv_id','alert'));
    
    }

    public function declineRide(Request $request)
    {
        $inv=$request->inv_no;
        $amb_no=$request->amb_no;
        $driver_details=Amb_info::where('amb_no',$amb_no)->get();

        if($request->ajax())
        {
            $driver = Amb_info::where('amb_no',$request->amb)->get();

            if($driver[0]->amb_drv_email==$request->email)
            {
                Patient_ambulance::where('invoice_no',$request->inv)->update(['ride_status'=>"101"]);
                Amb_info::where('amb_no',$request->amb)->update(['amb_status'=>'inactive']);
                return response()->json(['data'=>1]);
            }
            else
            {
                return response()->json(['data'=>0]);
            }
        }

        return view('amb_driver_ride_declined',compact('inv','amb_no','driver_details'));

    }

    //Function is called when driver finishes the ride 
    public function finishRide(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->data;
            return response()->json(['data'=>"Hello"]);
        }
        // $ride_info = Patient_ambulance::where('invoice_no',session('inv_id'))->get();
        // return $ride_info;
    }

    //Function called when driver verifies OTP
    public function verifyOTP(Request $request)
    {
        $amb_no_key = session('amb_id');

        $invoice_id = Patient_ambulance::where('amb_no',$amb_no_key)->where('ride_status','001')->get(['invoice_no']);

        $data = Patient_ambulance::where('invoice_no',$invoice_id[0]->invoice_no)->get();
        if($request->otp == $data[0]->otp)
        {
            $update_status = Patient_ambulance::where('invoice_no',$invoice_id[0]->invoice_no)->update(['ride_started_at'=>date('H:i:s'),'ride_status'=>'011']);

            if($update_status){
                
                $dest_details = Patient_ambulance::where('invoice_no',$invoice_id[0]->invoice_no)->get();
                return redirect("/driver-ride-started?inv_id=".$invoice_id[0]->invoice_no);

                //Redirecting to amb_driver_ride_started page with dest_details
            }
        }
        else
        {
            
            $ride_info = Patient_ambulance::where('amb_no',$amb_no_key)->where('ride_status','001')->get();
            $alert = "Please enter valid OTP";
            return view('amb_driver_ride_accepted_intf',compact('ride_info','alert')); 

            //Redirecting to same page with danger alert of invalid otp
        }

    }

    public function reachDestination(Request $request)
    {
        $inv_id = $request->inv_id;

        if($request->ajax())
        {
            //When driver clicks on finish ride button
            $update_ride_status = Patient_ambulance::where('invoice_no',$request->inv_id)->update(['ride_status'=>111,'ride_finished_at'=>date('H:i:s'),'total_ride_distance'=>$request->dist]);

            $amb_ptn_join = Amb_info::join('patient_ambulance','amb_info.amb_no','=','patient_ambulance.amb_no')->where('patient_ambulance.invoice_no','=',$request->inv_id)->get();
            $amb_ride_amount = $amb_ptn_join[0]->amb_rate * ($request->dist)/1000;
            $order_id = $request->inv_id;
            $user_id = $amb_ptn_join[0]->user_id;
            $details = compact('amb_ride_amount','order_id','user_id');
            return response()->json($details);
        }

        $dest_details = Patient_ambulance::where('invoice_no',$inv_id)->get();
        return view('amb_driver_ride_started',compact('dest_details'));
    }

    public function activateAccount(Request $request)
    {
        $amb_no=$request->amb_no;
        $driver_details=Amb_info::where('amb_no',$amb_no)->get();
        if($request->ajax())
        {
            $driver = Amb_info::where('amb_no',$request->amb)->get();

            if($driver[0]->amb_drv_email==$request->email)
            {
                Amb_info::where('amb_no',$request->amb)->update(['amb_status'=>'active']);
                return response()->json(['data'=>1]);
            }
            else
            {
                return response()->json(['data'=>0]);
            }
        }
        return view("amb_driver_acc_activate",compact('driver_details'));

        
    }
}
