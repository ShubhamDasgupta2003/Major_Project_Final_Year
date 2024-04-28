


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/adminb.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/useravatar.css')}}"> --}}
    <title>HCS Admin</title>
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
                <a href="#" class="active"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                {{-- <a href="{{route('admin_panel.admin_medical_supplies')}}"><span class="las la-shopping-bag"></span>
                    <span>Medical Supplies</span></a>
                </li>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/ambulance Srvc admin/amb_srvc_admin.php" ><span class="las la-ambulance"></span>
                    <span>Ambulance Service</span></a>
                </li>
                <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/Blood_Bank/adminb.php" ><i class="fa-solid fa-building-columns"></i></span>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/Blood_Bank/adminb.php"> <span class="las la-landmark"></span>
                    <span>Blood Bannk Service</span></a>
                </li>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/bed_booking_admin.php" ><span class="las la-hospital"></span>
                    <span>Bed Booking Service</span></a>
                </li>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/MedTechSupport/medtech_admin.php" ><span class="las la-hospital"></span>
                    <span>Aya/Nurse/Medical Technician</span></a>
                </li> --}}
              <!--  <li>
                    <a href=""><span class="las la-clipboard-list"></span>
                    <span>Projects</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-shopping-bag"></span>
                    <span>Orders</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-circle"></span>
                    <span>Inventory</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-circle"></span>
                    <span>Accounts</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-clipboard-list"></span>
                    <span>Inventory</span></a>
                </li>  -->
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
        <h6>
    <div class="user-avatar-container">
    <a href="" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar"style='font-size:15px;color:red'>  </i></a>@if (session()->has('hcs_admin_name'))
               {{session()->get('hcs_admin_name')}}
            @else
            @php
            return redirect("hcs_admin_login");
            @endphp
            @endif
           <a href="/hcs_admin_logout" id="user-avatar"><i class='fas fa-sign-out-alt' style='font-size:15px;color:red'></i></a>
    </div>
   
    </h6>
     
    </header>
    <main>
        <div class="cards">
            <div class="card-single">
                <div>
                  
                    <h1 style="color: #fff;"></h1>
                    <span>Customers</span>
                </div>
                <div>
                    <span class="las la-users" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    
                    <h1 style="color: #fff;"></h1>
                    <span>orders</span>
                </div>
                <div>
                    <span class="las la-shopping-bag" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h1 style="color: #fff;"> &#8377 </h1>
                    <span>Income(Current Month)</span>
                </div>
                <div>
                   <span class="lab la-google-wallet" ></span>  
                </div>
            </div>
        </div>


        <div class="recent-grid">
            <div class="projects">
                  <div class="card">
                     <div class="card-header">
                          <h2> Orders</h2>
                          
                     </div>
                     <div class="card-body">
                           <table width="100%">
                            <thead>
                                <tr>
                                    <td>Payment ID</td>
                                    <td>Amount</td>
                                    <td>Service</td>
                                </tr>
                            </thead>
                            <tbody>
                           
                            </tbody>
                           </table>
                     </div>
                  </div>
            </div>
            <div class="customers">
                <div class="card">
                    <div class="card-header">
                         <h2> Customers</h2>
                         <!--<button> See All <span class="las la-arrow-right"></span></button> -->
                    </div>
                    <div class="card-body">
            
                    
            </div>
        </div>
    </main>
   </div>



</body>
</html>