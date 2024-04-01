<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{asset("https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css")}}>
    <link rel="stylesheet" href={{asset("css/BedBook/bed_booking_admin.css")}}>
    <title>Bed booking service | Dashboard</title>
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span><span>Index</span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    {{-- <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/hospital_interface.php"  class="active"><span class="las la-igloo"></span> --}}
                        <a href={{url('hos_admin_interface')}}  class="active"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{url('custom_bed')}}"><span class="las la-hospital"></span>
                    <span>Customize Hospital Beds</span></a>
                </li>
               {{-- <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/display_update_bed.php"><span class="las la-clipboard-list"></span>
                    <span>Update Beds</span></a>
                </li>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/update_hos_info.php"><span class="las la-hospital"></span>
                    <span>Update Hospital Details</span></a>
                </li> --}}
            </ul>
        </div>
    </div>

   <div class="main-content">
    <header>
        <h3>
           <label for="nav-toggle">
             <span class="las la-bars"></span>
           </label>
           Dashboard
        </h3>
        <div class="search-wrapper">
            
        </div>

        <div class="user-wrapper">
            <i class="fa-solid fa-user fa-lg account-avatar"></i>
            <div>
                <!-- <h4> echo $sql2['Name']; </h4> -->
                <h4>{{$hos_info_all->hos_name}}</h4>
                <small>{{$hos_info_all->hos_id}}</small>
            </div>
        </div>
    </header>
    <main>
        <div class="cards">
            <div class="card-single">
                <div>
                    
                       
                        {{-- @php
                            use Illuminate\Support\Facades\DB;
                            $count= DB::table('Patient_booking_info')->where('hos_name',$pnt_info_all->hos_name)->count();
                            
                        @endphp --}}
                        @php
                            $num_rows = $pnt_info_all->count();
                        @endphp
                    <h1 style="color: #fff;">{{$num_rows}}</h1>
                    {{-- <h1 style="color: #fff;">2</h1> --}}
                   
                    <span>Successfull bookings through Emergency Medical Support System</span>
                </div>
                <div>
                    <span class="las la-check-circle" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                     
                        

                     {{-- @php
                       
                        use Carbon\Carbon;

                        $startTime = Carbon::now()->subHours(24);

                         $count2 = DB::table('Patient_booking_info')
                        ->where('hos_name', '=', $pnt_info_all->hos_name)
                        ->where('pnt_booking_date', '>=', $startTime)
                        ->count();
                     @endphp --}}
@php

use App\Models\Patient_booking_info;
use Carbon\Carbon;

$startTime = Carbon::now()->subHours(24);
$count = Patient_booking_info::where('pnt_booking_date', '<=', $startTime)->count();
@endphp


                    <h1 style="color: #fff;">{{$count}}</h1>
                    {{-- <h1 style="color: #fff;">0</h1> --}}
                    <span>Last 24 Hour Successfull Bookings</span>
                </div>
                <div>
                    <span class="las la-clock" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                          {{-- $t=0;
                          $j=0;
                          $sql=$obj->select('hospital_info','Male_bed_available',"Id='$hos_id'")->fetch_assoc();
                       --}}
                    <h1 style="color: #fff;">{{$hos_info_all->hos_male_bed_available}}</h1>
                    <span>Male Beds Available</span>
                </div>
                <div>
                   <span class="las la-male" ></span>  
                </div>
            </div>
            <div class="card-single">
                <div>
                          {{-- $t=0;
                          $j=0;
                          $sql=$obj->select('hospital_info','Female_bed_available',"Id='$hos_id'")->fetch_assoc();
                       --}}
                    <h1 style="color: #fff;">{{$hos_info_all->hos_female_bed_available}}</h1>
                    <span>Female Beds Available</span>
                </div>
                <div>
                   <span class="las la-female" ></span>  
                </div>
            </div>
        </div>


        <div class="recent-grid">
            <div class="projects">
            {{-- <div class="card">
                     <div class="card-header">
                          <h2> Patient Verification</h2>   
                     </div>
                     <div class="card-body">
                        <section class="search">
	                        <form action="" method="post">		    
		                        <input class="box" name="patient_id" placeholder="Enter patient id..." required>		    	
		                        <button name="submit" class="search-butt box">Search</button>
	                        </form>
                        </section>
                                   <table>
                                   <thead>
                                    <tr>
                                        <td>Patient Id.</td>
                                        <td>Date & Time</td>
                                        <td>Patient Name</td>
                                        <td>Contact Number</td>
                                        <td>Age</td>
                                        <td>Gender</td>
                                        <td>Email</td>
                                        <td>Address</td>
                                        <td>Postal Code</td>
                                        <td>Action</td>
                                    </tr>
                                </thead> 
                                <tbody>

                                <tr>
                                               <td >$sqlb[Patient_id] </td>
                                               <td >$sqlb[Booking_date] </td>
                                               <td>$sqlb[Patient_name]</td>
                                               <td>$sqlb[ContactNo]</td>
                                               <td>$sqlb[Age]</td>
                                               <td>$sqlb[Gender]</td>
                                               <td>$sqlb[email]</td>
                                               <td>$sqlb[Address2]</td>
                                               <td>$sqlb[Pin]</td>
                                               <td><form action='admit.php' method='post'><button class='box' name='admit'>Admit</button></form></td> 
                                               
                                  </tbody>
                                    </table>
                                   <table>
                                   <thead>
                                    <tr>
                                        <td>Patient Id.</td>
                                        <td>Date & Time</td>
                                        <td>Patient Name</td>
                                        <td>Contact Number</td>
                                        <td>Age</td>
                                        <td>Gender</td>
                                        <td>Email</td>
                                        <td>Address</td>
                                        <td>Postal Code</td>
                                        <td>Status</td>
                                    </tr>
                                </thead> 
                                <tbody>

                                <tr>
                                               <td >$sqlb[Patient_id] </td>
                                               <td >$sqlb[Booking_date] </td>
                                               <td>$sqlb[Patient_name]</td>
                                               <td>$sqlb[ContactNo]</td>
                                               <td>$sqlb[Age]</td>
                                               <td>$sqlb[Gender]</td>
                                               <td>$sqlb[email]</td>
                                               <td>$sqlb[Address2]</td>
                                               <td>$sqlb[Pin]</td>
                                               <td>$sqlb[booking_status]</td>
                                    </tbody>
                                    </table>
                        
                     </div>
                  </div> --}}
                  <div class="card">
                     <div class="card-header">
                          <h2> Patient Details</h2>
                          
                     </div>
                     <div class="card-body">
                           <table width="100%">
                            <thead>
                                <tr>
                                    <td>Patient Id.</td>
                                    <td>Date & Time</td>
                                    <td>Patient Name</td>
                                    <td>Contact Number</td>
                                    <td>Age</td>
                                    <td>Gender</td>
                                    <td>DOB</td>
                                    <td>Email</td>
                                    <td>Address</td>
                                    <td>Postal Code</td>
                                </tr>
                            </thead>
                            @foreach($pnt_info_all as $pnt_info_all)
                                <tbody>
                                    <tr>
                                               <td>{{$pnt_info_all->pnt_id}}</td>
                                               <td>{{$pnt_info_all->pnt_booking_date}}</td>
                                               <td>{{$pnt_info_all->pnt_first_name}} {{$pnt_info_all->pnt_last_name}}</td>
                                               <td>{{$pnt_info_all->pnt_contactno}}</td>
                                               <td>{{$pnt_info_all->pnt_age}}</td>
                                               <td>{{$pnt_info_all->pnt_gender}}</td>
                                               <td>{{$pnt_info_all->pnt_dob}}</td>
                                               <td>{{$pnt_info_all->pnt_email}}</td>
                                               <td>{{$pnt_info_all->pnt_address}}</td>
                                               <td>{{$pnt_info_all->pnt_pincode}}</td>  
                                    </tr>
                                </tbody>
                            @endforeach
                           </table>
                     </div>
                  </div>
            </div>
</body>
</html>