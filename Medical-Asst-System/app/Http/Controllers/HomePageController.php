<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function locationPopUpWin(Request $request)
    {
        if($request->ajax())
        {
            $adds = $request->full_address;
            $lat = $request->lat;
            $lng = $request->lng;

            $data = compact('adds','lat','lng');
            //Update users table with requested address and return 
            return response()->json(['data'=>$data]);
        }

        return view('welcome');
    }
}
