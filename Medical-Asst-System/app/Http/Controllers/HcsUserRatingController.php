<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hcs_user_rating;

class HcsUserRatingController extends Controller
{
    public function index(){
        return view("hcs_add_rating");
        }
        public function add_rating(Request $request){
            $table = new Hcs_user_rating;
            $table->rating_comment = $request->input('rating_comment');
            $table->user_id = session()->get('user_id');
            $table->user_name = session()->get('user_name');
            $table->emp_id = $request->input('emp_id');
            $table->rating_value = $request->input('rate'); // Correctly retrieve rating_value from the request
            $table->save();
            return redirect("/");
        }
        public function show(Request $request){
            $ratings= Hcs_user_rating::all();
            $data = compact('ratings');
            return view("show_rating")->with($data);
        }
}
