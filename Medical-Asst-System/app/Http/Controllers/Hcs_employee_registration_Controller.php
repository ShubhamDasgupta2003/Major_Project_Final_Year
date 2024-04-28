<?php

namespace App\Http\Controllers;
use App\Models\HcsEmployeeTableModel;

use Illuminate\Http\Request;

class Hcs_employee_registration_Controller extends Controller
{
    //
    public function register(Request $request){
        $emp_table = new HcsEmployeeTableModel;
        $emp_table->emp_name = $request->input('emp_name');
        $emp_table->emp_gender = $request->input('emp_gender');
        $emp_table->emp_type = $request->input('emp_type');
        $emp_table->emp_email = $request->input('emp_email');
        $emp_table->emp_contact_num = $request->input('emp_contact_num');
        $emp_table->emp_status = "Free";
        $emp_table->emp_salary = $request->input('emp_salary');
        $emp_table->emp_govt_id = $request->input('emp_govt_id');
        // $emp_table->emp_govt_id_path = $request->input('emp_salary');
        // $emp_table->emp_photo_path = $request->input('emp_salary');
        // $emp_table->emp_photo_path = $request->input('emp_bio_data_path');
        $emp_table->save();
        return redirect("/hcs");
        

        
    }
    public function aya_home(){
        $employess= HcsEmployeeTableModel::all(); 
        $data = compact('employess');
        return view("hcs_home_aya")->with($data);
    }   
}
