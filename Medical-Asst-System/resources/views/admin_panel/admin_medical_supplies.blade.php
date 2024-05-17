
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/adminb.css')}}">
    <title>Document</title>
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
                <a href="{{route('admin_panel.index')}}"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                <a href="{{route('admin_panel.admin_medical_supplies')}}" class="active"><span class="las la-shopping-bag"></span>
                    <span>Medical Supplies</span></a>
                </li>
                <li>
                    <a href="{{route('amb_admin_show_data')}}"><span class="las la-ambulance"></span>
                    <span>Ambulance Service</span></a>
                </li>
                <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/Blood_Bank/adminb.php" ><i class="fa-solid fa-building-columns"></i></span>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/Blood_Bank/adminb.php"> <span class="las la-landmark"></span>
                    <span>Blood Bannk Service</span></a>
                </li>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/bed_booking_admin.php" ><span class="las la-hospital"></span></span>
                    <span>Bed Booking Service</span></a>
                </li>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/MedTechSupport/medtech_admin.php" ><span class="las la-hospital"></span>
                    <span>Aya/Nurse/Medical Technician</span></a>
                </li>
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
     </header>
  
    <main>
        <div class="cards">
            <div class="card-single">
                
                <div>
                   
                    <h1 style="color: #fff;"> <{{ $userCount }}</h1>
                    <span>Customers</span>
                </div>
                <div>
                    <span class="las la-users" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
           
                <div>
                  
                    <h1 style="color: #fff;">{{ $currentMonthOrdersCount }}</h1>
                    <span>orders(Current Month)</span>
                </div>
                <div>
                    <span class="las la-shopping-bag" style="color: #fff;"></span>
                </div>
                <div>
            </div>
            </div></a> 
            <div class="card-single">
                <div>
                    <h1 style="color: #fff;"> &#8377  {{ $totalProductrate }}</h1>
                    <span>Income(Current Month)</span>
                </div>
                <div>
                   <span class="lab la-google-wallet" ></span>                                          
                </div>
            </div>
            <a href="{{route('admin_panel.input')}}"><div class="card-single">
                <div>
                    <h1 style="color: #fff;">Input</h1>
                    <span>Table</span>
                </div>
                <div>
                </div>
            </div></a> 
          
            <a href="{{route('admin_panel.supplies')}}"><div class="card-single">
                <div>
                    <h1 style="color: #fff;">Supplies</h1>
                    <span>Table</span>
                </div>
                <div>
                </div>
            </div></a> 
            <a href="{{route('admin_panel.order')}}" style="color:#fff"><div class="card-single">
                <div>
                    <h1 style="color: #fff;">Order</h1>
                    <span>Table</span>
                </div>
                <div>
                </div>
            </div></a> 
        </div>


        <div class="recent-grid">
            <div class="projects">
                  <div class="card">
                     <div class="card-header">
                          <h2> Medical Supplies</h2>
                          
                     </div>
                     <div class="card-body" style="height: 300px; overflow: auto;">
                        <table width="100%">
                             <thead>
                                  <tr>
                                      <td>Product ID</td>
                                      <td>Product Name</td>
                                      <td>Product Rate</td>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($medical_supplies_medicals as $medical_supplies_medical)
                                  <tr>
                                      <td>{{$medical_supplies_medical->product_id}}</td>
                                      <td>{{$medical_supplies_medical->product_name}}</td>
                                      <td>{{$medical_supplies_medical->product_rate}}</td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
            </div>
           
     <!--       <div class="projects">
                  <div class="card">
                     <div class="card-header">
                          <h2> Orders</h2>
                          
                     </div>
                     <div class="card-body">
                           <table width="100%">
                            <thead>
                                <tr>
                                    <td>Order ID</td>
                                    <td>Username</td>
                                    <td>Price</td>
                                </tr>
                            </thead>
                            <tbody>
                           
                            </tbody>
                           </table>
                     </div>
                  </div>
            </div>                         -->
            
         </div>

      

    
    <!--   <a href="" style="color:#fff"><div class="card-single">
                <div>
                    <h1 style="color: #fff;">Insert Data</h1>
                    <span>in the table</span>
                </div>
                <div>
                </div>
            </div></a>  
        
    
           echo"<tr>
            <td >$row[product_image] </td>
            <td>$row[product_name]</td>
            <td>&#8377 $row[product_rate]</td>
          

        </tr>"; -->
</body>
</html>