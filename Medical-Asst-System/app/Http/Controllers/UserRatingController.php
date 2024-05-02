<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_rating;
use App\Models\User_info;

class UserRatingController extends Controller
{   public function index(){
    return view("add_rating");
    }
    public function add_rating(Request $request){
        $table = new User_rating;
        $table->rating_comment = $request->input('rating_comment');
        $table->user_id = session()->get('user_id');
        $table->user_name = session()->get('user_name');
        $table->rating_value = $request->input('rate'); // Correctly retrieve rating_value from the request
        $table->save();
        return redirect("/");
    }
    public function show(Request $request){
        $ratings= User_rating::all();
        $data = compact('ratings');
        return view("show_rating")->with($data);
    }
    

   
}
