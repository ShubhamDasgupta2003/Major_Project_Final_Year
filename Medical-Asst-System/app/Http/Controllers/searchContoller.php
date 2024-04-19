<?php

namespace App\Http\Controllers;

use App\Models\BloodBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class searchContoller extends Controller
{

    public function search(Request $req){
        $query = BloodBank::query();

        if($req->ajax()){
            $banks = $query->where('id', $req->search)->get();
            Session::put('search_result', $banks);
            return response()->json(['data' => $banks]);
        } else {
            $banks = $query->where('id','')->get();
            return view('Blood_Booking.a', compact('banks'));
        }
    }

}
