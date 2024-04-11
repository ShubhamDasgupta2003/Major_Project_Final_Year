<?php

namespace App\Http\Controllers;

use App\Models\blood_group;
use App\Models\BloodBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
class BloodBankController extends Controller
{
    public function newregistration(request $req){
        $validate=$req->validate([
            'name'=>'required',
            'email'=>'required|email',
            'lat'=>'required',
            'lon'=>'required',
            'state'=>'required',
            'city'=>'required',
            'phone'=>'required',
            'dist'=>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
        ]);

        $banks=new BloodBank();
        $banks->name=$req->name;
        $banks->email=$req->email;
        $banks->password=hash::make($req->password);
        $banks->latitude=$req->lat;
        $banks->longitude=$req->lon;
        $banks->state=$req->state;
        $banks->city=$req->city;
        $banks->phone=$req->phone;
        $banks->dist=$req->dist;
        $banks->pin=$req->pin;
        $res=$banks->save();

        if($res){
            return back()->with('success','You have registered successfully');
         }else{
            return back()->with('failed','You have not registered successfully');
         }           
    }

        // return data to bloodbank's home page
        public function bloodGroup()
        {
         $bloodBanks = blood_group::all(); // Fetch all blood banks from the database
         return $bloodBanks;

        }

  


        // public function showBloodBanks($bg)
        // {
           
        //     $query = "SELECT
        //           blood_banks.*,
        //           blood_group.*
        //           FROM blood_bank_blood_group
        //           JOIN blood_group ON blood_bank_blood_group.blood_group_id = blood_group.blood_group_id
        //           JOIN blood_banks ON blood_bank_blood_group.blood_bank_id = blood_banks.id
        //           WHERE blood_bank_blood_group.blood_group_id = (
        //           SELECT blood_group_id 
        //           FROM blood_group 
        //           WHERE group_name = ?
        //       )";

        //     $bloodBanks = DB::select($query, [$bg]);
    
        //     return view('Blood_Booking.bloodB_home', ['bloodBanks' => $bloodBanks]);

        // }
        public function showBloodBanks(request $req){
            $query=BloodBank::query();
    
            if($req->ajax()){
               // return $req->search;
               // $banks=$query->where('name','LIKE','%'.$req->search.'%')->get();
              $banks = DB::table('blood_bank_blood_group')
               ->join('blood_group', 'blood_bank_blood_group.blood_group_id', '=', 'blood_group.blood_group_id')
               ->join('blood_banks', 'blood_bank_blood_group.blood_bank_id', '=', 'blood_banks.id')
               ->where('blood_bank_blood_group.blood_group_id', function ($subquery) use ($req) {
                   $subquery->select('blood_group_id')
                       ->from('blood_group')
                       ->where('group_name', $req->search);
               })->get();  

            return response()->json(['bloodbanks'=>$banks]);
            }else{

                 $bloodbanks=$query->where('id','')->get();
                 return view('Blood_Booking/bloodB_home',compact('bloodbanks'));
            }
        }
}
