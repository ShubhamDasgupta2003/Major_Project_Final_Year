<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amb_info;
class AmbInfoPageController extends Controller
{
    //
    public function showAmbulanceServices()
    {
        $amb_data = Amb_info::all();
        return view('amb_ptn_home',compact('amb_data'));
    }
}
