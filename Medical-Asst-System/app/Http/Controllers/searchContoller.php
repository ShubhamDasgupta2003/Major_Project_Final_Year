<?php

namespace App\Http\Controllers;

use App\Models\BloodBank;
use Illuminate\Http\Request;


class searchContoller extends Controller
{
    public function search(request $req){
     $query=BloodBank::query();
    
     if($req->ajax()){
        // return $req->search;
        // $banks=$query->where('name','LIKE','%'.$req->search.'%')->get();
        $banks=$query->where('id', $req->search)->get();
        return response()->json(['banks'=>$banks]);
     }else{

         $banks=$query->where('id','')->get();
         return view('Blood_Booking/a',compact('banks'));
     }
    }
}
