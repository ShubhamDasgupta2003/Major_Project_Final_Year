<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hcs_admin;

class HcsAuthController extends Controller
{
    public function index(){
        return view("hcs_admin_login");
    }
    public function login(Request $request){
       $user=Hcs_admin::where('admin_email',$request->input('admin_email'))->where('admin_password',$request->input('admin_password'))->first();
       if($user){
            $request->session()->put('hcs_admin_name',$user->admin_name);
            return redirect('hcs_admin');
        }
        else{
          return redirect('hcs_admin_login')->with('failed','Email/Password is incorrect.');
        }
    }
    public function logout(Request $request){
    session()->forget('hcs_admin_name');
    return redirect("hcs_admin_login");
    }
    public function admin_intf(Request $request){
        if(session()->has('hcs_admin_name')){
        return view("hcs_admin_intf");}
        else
        {return redirect("hcs_admin_login");}
            
    }
    //
}
