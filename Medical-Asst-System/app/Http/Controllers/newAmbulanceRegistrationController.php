<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amb_info;
use App\Models\Ambulance_Admin;
use App\Models\City_Table;
use App\Models\states;
use App\Models\district;
class newAmbulanceRegistrationController extends Controller
{
    //
    public function showCreatePassword(Request $request)
    {
        $data = $request->user_info_arr;
        return view('amb_admin_set_pswd',compact('data'));
    }
    public function createPassword(Request $request)
    {

        $request->validate([
            "amb_password_reg"=>"required|min:5|max:15",
            "amb_cnfm_password_reg"=>"required|min:5|max:15"
        ]);

        $amb_admin = new Ambulance_Admin;

        $amb_admin->amb_no = $request['amb_no'];
        $amb_admin->amb_admin_email = $request['amb_drv_email_reg'];
        $amb_admin->amb_admin_mob = $request['amb_drv_contact_reg'];
        $amb_admin->amb_admin_paswd = $request['amb_password_reg'];

        $amb_admin->save();
        return redirect()->route('display.login');

    }
    public function showRegForm()
    {
        $cities = City_Table::orderBy('city_ascii')->get();
        $states = states::query()->orderBy('States')->get();
        $district = district::query()->orderBy('District')->get();
        return view('new_amb_reg',compact('cities','states','district'));
    }
    public function addNewService(Request $request)
    {
        $request->validate([
            'amb_no'=>'required|max:11|unique:amb_info',
            "amb_name_reg"=>"required|max:50",
            "amb_type_reg"=>"required",
            "amb_rate_reg"=>"required",
            "amb_drv_name_reg"=>"required",
            "amb_drv_contact_reg"=>"required|max:10",
            "amb_drv_email_reg"=>"required|email",
            "amb_addr_reg"=>"required",
            "amb_lat_reg"=>"required",
            "amb_lon_reg"=>"required",
            "amb_state_reg"=>"required",
            "amb_district_reg"=>"required",
            "amb_town_reg"=>"required",
            "amb_pincode_reg"=>"required",
           
        ]);

        $amb = new Amb_info;

        $amb->amb_name = $request['amb_name_reg'];
        $amb->amb_no = $request['amb_no'];
        $amb->amb_type = $request['amb_type_reg'];
        $amb->amb_status = "Active";
        $amb->amb_loc_lat = $request['amb_lat_reg'];
        $amb->amb_loc_lng = $request['amb_lon_reg'];
        $amb->amb_rate = $request['amb_rate_reg'];
        $amb->amb_contact = $request['amb_drv_contact_reg'];
        $amb->amb_driver_name = $request['amb_drv_name_reg'];
        $amb->amb_drv_email = $request['amb_drv_email_reg'];
        $amb->amb_address = $request['amb_addr_reg'];
        $amb->amb_state = $request['amb_state_reg'];
        $amb->amb_district = $request['amb_district_reg'];
        $amb->amb_town = $request['amb_town_reg'];
        $amb->amb_loc_pincode = $request['amb_pincode_reg'];

        $amb->save();

        $user_info_arr = array('email'=>$request['amb_drv_email_reg'],'mob'=> $request['amb_drv_contact_reg'],'amb_no'=>$request['amb_no']);
        return redirect()->route('ambAdminPassForm',compact('user_info_arr'));
    }
}
