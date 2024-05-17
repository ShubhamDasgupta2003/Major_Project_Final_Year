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


    // new hospital form display 
    public function DisplayForm(){
        return view('hos_register');
    }

    // new hospital entry done here 
    public function HosDataEntry(Request $request)
    {
        // $request->validate([
            // "hos_id"=>"required|max:30|",
            // "hos_name"=>"required|max:60|",
            // "hos_email"=>"required|email",
            // "hos_lat"=>"required",
            // "hos_long"=>"required",
            // "hos_contactno"=>"required|max:10",
            // "hos_address"=>"required",
            // "hos_district"=>"required",
            // "hos_city"=>"required",
            // "hos_state"=>"required",
            // "hos_pincode"=>"required",
            // "hos_male_bed_available"=>"required",
            // "hos_female_bed_available"=>"required",
            // "hos_password"=>"required",
            // "hos_bed_charge"=>"required",
        // ]);
        $hos = new Hospital_info;

        // random hospital id generate starts here
        $randomNumber = str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);
        $hospital_id = "HSP".$randomNumber;
        // random hospital id generate ends here
        $hos->hos_id = $hospital_id;
        $hos->hos_name = $request['hos_name'];
        $hos->hos_email = $request['hos_email'];
        $hos->hos_lat= $request['hos_lat'];
        $hos->hos_long= $request['hos_long'];
        $hos->hos_contactno = $request['hos_contactno'];
        $hos->hos_address = $request['hos_address'];
        $hos->hos_district = $request['hos_district'];
        $hos->hos_city = $request['hos_city'];
        $hos->hos_state = $request['hos_state'];
        $hos->hos_pincode = $request['hos_pincode'];
        $hos->hos_male_bed_available = $request['hos_male_bed_available'];
        $hos->hos_female_bed_available = $request['hos_female_bed_available'];
        $hos->hos_password = $request['hos_password'];
        $hos->hos_bed_charge = $request['hos_bed_charge'];
        $hos->save();
        return redirect('/hos_bed');
    }

    // for redirecting to hospital interface page 

    public function HosInterfaceDisplay(){
        return view('hos_interface');
    }

    // for displaying hospital data in hospital interface page 
    public function GetHosData(){
        $hos_id = session('hos_id');
        // $pnt_id = session('pnt_id');
        $hos_info_all= Hospital_info::where('hos_id','=',$hos_id)->first();
        $hos_name=$hos_info_all->hos_name;
        $pnt_info_all= Patient_booking_info::where('hos_name','=',$hos_name)->get();
        return view('hos_interface')->with([
            'hos_info_all' => $hos_info_all,
            'pnt_info_all' => $pnt_info_all
        ]);
    }

    // for displaying customize hospital beds page (hospital admin) 
    public function CustomBedDesign(){
        $hos_id = session('hos_id');
        $pnt_id = session('pnt_id');
        $hos_info_all= Hospital_info::where('hos_id','=',$hos_id)->first();
        $hos_name=$hos_info_all->hos_name;
        $pnt_info_all= Patient_booking_info::where('hos_name','=',$hos_name)
        ->where('pnt_gender', '=', 'Male')
        ->where('pnt_booking_status', '=', 'Admitted')
        ->get();
        $pnt_info_all_female= Patient_booking_info::where('hos_name','=',$hos_name)
        ->where('pnt_gender', '=', 'Female')
        ->where('pnt_booking_status', '=', 'Admitted')
        ->get();
        return view('/hospital bed/custom_bed_design')->with([
            'hos_info_all' => $hos_info_all,
            'pnt_info_all' => $pnt_info_all,
            'pnt_info_all_female' => $pnt_info_all_female
        ]);
    }
// after clicking button 
    public function CustomBedPntDetails(){
        $hos_id = session('hos_id');
        $pnt_id = session('pnt_id');
        $hos_info_all= Hospital_info::where('hos_id','=',$hos_id)->first();
        $hos_name=$hos_info_all->hos_name;
        $pnt_info_all= Patient_booking_info::where('hos_name','=',$hos_name)
        ->where('pnt_gender', '=', 'Male')
        ->get();
        $pnt_info_all_female= Patient_booking_info::where('hos_name','=',$hos_name)
        ->where('pnt_gender', '=', 'Female')
        ->get();
        return view('/hospital bed/pnt_status')->with([
            'hos_info_all' => $hos_info_all,
            'pnt_info_all' => $pnt_info_all,
            'pnt_info_all_female' => $pnt_info_all_female
        ]);
    }
    // for patient verification  
    public function DisplayPntVerify(){
        $hos_id = session('hos_id');
        // $pnt_id = session('pnt_id');
        $hos_info_all= Hospital_info::where('hos_id','=',$hos_id)->first();
        $hos_name=$hos_info_all->hos_name;
        $pnt_info_all= Patient_booking_info::where('hos_name','=',$hos_name)->get();
        return view ('/hospital bed/pnt_verify')->with([
            'hos_info_all' => $hos_info_all,
            'pnt_info_all' => $pnt_info_all
        ]);
    }
    // patient verification functions starts here

    public function DeadlineCount(){
        // $pnt_deadline_check= Patient_booking_info::where('hos_name','=',$hos_name,'AND pnt_booking_status','=','Applied')->get();
        $hos_id = session('hos_id');
        $pnt_id = session('pnt_id');
        $hos_info_all= Hospital_info::where('hos_id','=',$hos_id)->first();
        $hos_name=$hos_info_all->hos_name;
        $pnt_deadline_check = Patient_booking_info::where([
            ['hos_name', '=', $hos_name],
            ['pnt_booking_status','=','Applied'],
            ])->get();
            $curr_timestamp = time();
            $stored_timestamp = [];
            foreach ($pnt_deadline_check as $record) {
            $stored_timestamp[] = $record->pnt_booking_deadline_timestamp;
}
            // $stored_timestamp=$pnt_deadline_check->pnt_booking_deadline_timestamp;
            foreach($stored_timestamp as $data){
                if($curr_timestamp>=$data){
                    Patient_booking_info::where('pnt_booking_status','Applied')->update([
                            'pnt_booking_status' => 'Expired'
                        ]);
            }
            }
            return view('/hospital bed/pnt_verify')->with('hos',$hos_info_all);
        
    }
    // patient verification functions ends here

    
    public function PntdataRelease(Request $request , $pnt_id){
        session(['pnt_id' => $pnt_id]);
        $patient = Patient_booking_info::where('pnt_id', $pnt_id)->firstOrFail();
        return view('hospital bed/pnt_status', compact('patient'))->with('pnt_id', $pnt_id);
    }
    public function PntDischarge(){
        $pnt_id = session('pnt_id');
        // return view('hospital bed/discharge_page')->with('pnt_id', $pnt_id);
        // $pnt_info_one= Patient_booking_info::where('pnt_id','=',$pnt_id)->get();
        // $pnt_hos_name=$pnt_info_all->hos_name;
        // $pnt_gender=$pnt_info_all->pnt_gender;
        // $hos_info_one= Hospital_info::where('hos_name','=',$pnt_hos_name)->first();
        // $hos_name=$hos_info_one->hos_name;
        // $hos_male_bed=$hos_info_one->hos_male_bed_available;
        // $hos_female_bed=$hos_info_one->hos_female_bed_available;
        Patient_booking_info::where('pnt_id',$pnt_id)->update([
            'pnt_booking_status' => "Discharged" 
        ]);

        // if($pnt_gender=='male'){
            // Hospital_info::where('hos_name',$hos_name)->update([
                // 'hos_male_bed_available' => $hos_male_bed +1
            // ]);
        // }
        // elseif($pnt_gender=='female'){
            // Hospital_info::where('hos_name',$hos_name)->update([
                // 'hos_female_bed_available' => $hos_female_bed +1
            // ]); 
        // }
        return view ('hospital bed/discharge_page');
    }
}
