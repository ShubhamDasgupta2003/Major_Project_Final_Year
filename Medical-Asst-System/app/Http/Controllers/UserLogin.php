<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_info;

class UserLogin extends Controller
{   public function index(){
    return view("user_login");
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
       return redirect('user_login')->with('failed','Email/Password is incorrect.');
     }
 }
}
