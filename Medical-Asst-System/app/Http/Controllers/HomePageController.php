<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_rating;
use App\Models\User_info;
class HomePageController extends Controller
{
    public function locationPopUpWin(Request $request)
    {
        if($request->ajax())
        {
            $adds = $request->full_address;
            $lat = $request->lat;
            $lng = $request->lng;
            $uid = $request->uid;
            $data = compact('adds','lat','lng','uid');
            //Update users table with requested address and return
            User_info::where('user_id',$uid)->update(['user_lat_in_use'=>$lat,'user_long_in_use'=>$lng,'user_formatted_address'=>$adds]);
            return response()->json(['data'=>$data]);
        }


        $ratings= User_rating::all()->sortByDesc('rating')->take(5); 

        if(session()->has('user_id'))
        {
            $user_adds=User_info::where('user_id',session('user_id'))->get();
            return view('welcome',compact('ratings','user_adds'));
        }
        else
        {
            return view('welcome',compact('ratings'));
        }  
    }
}
