<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_info;
use Illuminate\Support\Facades\Session;

class UserLogin extends Controller
{   public function index(){
    if (session()->has('user_name')) {
        // Redirect to another page
        return view('Blood_Booking/profilePage');
    }{
    return view("user_login");}
    
    }

    public function login(Request $request){
      
    $user=User_info::where('user_email',$request->input('email'))->where('user_password',$request->input('password'))->first();
    if($user){
         $request->session()->put('user_name',$user->user_first_name);
         $request->session()->put('user_id',$user->user_id);
         $request->session()->put('user_email',$user->user_email);
         return redirect('/');
     }
     else{
        session()->put('logged_in',0);
       return redirect('user_login')->with('failed','Email/Password is incorrect.');
     }
 }


 public function logout(){
    session()->forget('user_name');
    session()->forget('user_id');
    session()->forget('user_email');
    return redirect('');
 }
}
