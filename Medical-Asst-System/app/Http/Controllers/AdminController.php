<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\medical_supplies_medical;
use App\Models\medical_supplies_technical;
use App\Models\cart;
class AdminController extends Controller
{
    public function index()
   {
    return view('admin_panel.index');
   }
   public function admin_supplies()
   {
    return view('admin_panel.admin_medical_supplies');
   }
}
