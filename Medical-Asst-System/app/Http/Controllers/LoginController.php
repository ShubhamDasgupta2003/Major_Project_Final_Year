<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Hospital_info;
use App\Models\Amb_info;
use App\Models\Ambulance_Admin;

class LoginController extends Controller
{
    // public function ServiceAdminLogin(){

    // }
    public function DisplayLogin(){
        return view('login');
    }

    public function FetchServiceData(Request $request){
       
       
        $request->validate([
            "email_number"=>"required|email",
            "password"=>"required",
            "service"=>"required",
        ]);
        
        session(['is_adm_login' => 0]);
        

        $email_number = $request['email_number'];
        $password = $request['password'];
        $service = $request['service'];
        
       if($service=="Hospital Bed Booking Service")
       {
                $hos_data = Hospital_info::where('hos_email','=',$email_number)->orWhere('hos_contactno','=',$email_number)->first();
                if($hos_data){
                    //    echo "$hos_data";
                    if($hos_data){
                    $storedpassword= $hos_data->hos_password;
                        if($storedpassword===$password){
                            // echo "$hos_data->hos_id";
                            session(['hos_id' => $hos_data->hos_id]);
                            session(['is_adm_login' => 1]);
                            return redirect()->route('hos.data.interface')->with([
                                'hos_id',$hos_data->hos_id
                            ]);
                            
                        //     echo"$hos_data->hos_id";
                        }else{
                            // echo "false";
                            session(['is_adm_login' => 0]);
                            echo "<script>alert('Password incorrect! Enter a valid password')</script>";
                        }
                    }
                }else {
                    echo "<script>alert('Invalid E-mail! Enter a valid E-mail')</script>";
                    // return redirect()->route('display.login');
                }
       }
       //Ambulance service login starts here
       if($service=="Ambulance Service")
       {
                $amb_admin = Ambulance_Admin::where('amb_drv_email','=',$email_number)->orWhere('amb_contact','=',$email_number)->first();
                if($amb_admin){

                    //    echo "$hos_data";
                    if($amb_admin){
                    $storedpassword= $amb_admin->amb_admin_paswd;
                        if($storedpassword===$password){
                            // echo "$hos_data->hos_id";
                            session(['amb_id' => $amb_admin->amb_no]);
                            session(['is_adm_login' => 1]);
                            return redirect()->route('showAvblRides')->with([
                                'amb_id',$amb_admin->amb_no
                            ]);
                            
                        //     echo"$hos_data->hos_id";
                        }else{
                            // echo "false";
                            session(['is_adm_login' => 0]);
                            echo "<script>alert('Password incorrect! Enter a valid password')</script>";
                        }
                    }
                }else {
                    echo "<script>alert('Invalid E-mail! Enter a valid E-mail')</script>";
                }
       }
        //Ambulance service login ends here

    //         // return view('hos_interface')->with([
    //         //     'email_number' => $email_number,
    //         //     'password' => $password,
    //         //     'service' => $service,
    //         //     'hos_data' =>$hos_data
    //         // ]);
    //         if($hos_data){
    //             if($hos_data->count() == 1){
    //                 $storedpassword= $hos_data->hos_password;
    //                 if($storedpassword===$password){
    //                     session(['hos_id' => $hos_data->hos_id]);
    //                     session(['is_adm_login' => 1]);
    //                     // return view('hos_interface');
    //                     return view('hos_interface')->with([
    //                         'email_number' => $email_number,
    //                         'password' => $password,
    //                         'service' => $service,
    //                         'hos_data' =>$hos_data
    //                     ]);
    //                 }else{
    //                     session(['is_adm_login' => 0]);
    //                     echo "<script>alert('Password incorrect! Enter a valid password')</script>";
    //                 }
    //             }
    //         }else{
    //             echo "no";
    //         }
    }
}
