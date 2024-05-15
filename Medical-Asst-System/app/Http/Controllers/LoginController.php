<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Hospital_info;
use App\Models\Amb_info;
use App\Models\Ambulance_Admin;
use App\Models\BloodBank;
use App\Models\HcsEmployeeTableModel;

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

                $amb_admin = Ambulance_Admin::where('amb_admin_email',$email_number)->orWhere('amb_admin_mob',$email_number)->first();
                if($amb_admin){
                    //    echo "$hos_data";
                    if($amb_admin){
                    $storedpassword= $amb_admin->amb_admin_paswd;
                        if($storedpassword===$password){
                            // echo "$hos_data->hos_id";
                            session(['amb_id' => $amb_admin->amb_no]);
                            session(['is_adm_login' => 1]);
                            return redirect()->route('showAvblRides');
                            
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

       if($service=="Healthcare Support")
       {
                $hcs_data = HcsEmployeeTableModel::where('emp_verification','=',"Done")->where('emp_email','=',$email_number)->first();
                if($hcs_data){
                    //    echo "$hos_data";
                    if($hcs_data){
                    $storedpassword= $hcs_data->password;
                        if($storedpassword===$password){
                            // echo "$hos_data->hos_id";
                            session(['emp_admin_name' => $hcs_data->emp_name]);
                            session(['emp_admin_id' => $hcs_data->emp_id]);
                            session(['is_adm_login' => 1]);
                            return redirect()->route('show_emp_admin_intf')->with([
                                'emp_id',$hcs_data->emp_id
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
       


        // Blood Bank Admin login 
        if($service=="Blood Bank Service")
        {
                 $bloodBank_admin = BloodBank::where('email',$email_number)->orWhere('phone',$email_number)->first();
                 if($bloodBank_admin){
                     //    echo "$hos_data";
                     if($bloodBank_admin){
                     $storedpassword= $bloodBank_admin->password;
                         if($storedpassword===$password){
                             // echo "$hos_data->hos_id";
                             session(['bloodBank_id' => $bloodBank_admin->id]);
                             session(['bloodBank_name' => $bloodBank_admin->name]);
                             session(['is_bldadmin_login' => 1]);
                             return redirect()->route('Blood_admin_page')
                                              ->with(['bldBank_id',
                                                      $bloodBank_admin->id
                                                     ]);
                             
                         //     echo"$hos_data->hos_id";
                         }else{
                             // echo "false";
                             session(['is_bldadmin_login' => 0]);
                             echo "<script>alert('Password incorrect! Enter a valid password')</script>";
                         }
                     }
                 }else {
                     echo "<script>alert('Invalid E-mail! Enter a valid E-mail')</script>";
                 }
        }

    }
}
