<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/BloodBank/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Blood Bank | Dashboard</title>
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
                    <a href=""  class="active"><span class="las la-landmark"></span>
                    <span>Your Blood Bank </span></a>
                </li>
               <!-- <li>
                    <a href="http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/db_insertions/db_config/BloodBanks.php"><span class="las la-clipboard-list"></span>
                    <span>Blood Banks</span></a>
                </li>
                <li>
                    <a href="http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/db_insertions/db_config/BloodDetails.php"><span class="las la-shopping-bag"></span>
                    <span>Blood</span></a>
                </li> -->
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
            
            <div>
                
                <h5><i class="fa-solid fa-user fa-lg account-avatar"></i> Life line blood Bank
                <a href="http://localhost/minor%20Project%205th_Sem/Emergency_Medical_Support_System/db_insertions/db_config/update_Blood_bank.php"><i class="fa-solid fa-pen-to-square"></i></a></h5>
            </div>
        </div>
    </header>
    <main>
        <div class="cards">
           
            <div class="card-single">
                <div>
                    <?php
                         30
                        // $ord_count=0;
                        // $sqlr=$obj->select('blood_order','COUNT(order_id) AS comp_orders',"bloodbank_id='$blood_bank_id'")->fetch_assoc();    
                     ?>
                    <h1 style="color: #fff;">10</h1>
                    <span>Successfull Orders</span>
                </div>
                <div>
                    <span class="las la-check-circle" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                     {{-- <?php
                        $ord_count=0;
                        $sqlr=$obj->select('blood_order','COUNT(order_id) AS latest_booking',"Order_date >= DATE_SUB(NOW(), INTERVAL 1 DAY) AND bloodbank_id='$blood_bank_id'")->fetch_assoc();    
                     ?>
                    <h1 style="color: #fff;"> <?php  echo $sqlr['latest_booking'] ?> </h1>
                    <span>Orders in Last 24 Hour</span> --}}
                </div>
                <div>
                    <span class="las la-clock" style="color: #fff;"></span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h1 style="color: #fff;">30000></h1>
                    <span>Income</span>
                </div>
                <div>
                   <span class="las la-wallet" ></span>  
                </div>
            </div>
            
        </div>


        <div class="recent-grid">
            <div class="projects">
            <div class="card">
        
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header">
                          <h2>Pending Orders</h2>
                          
                     </div>
                     <div class="card-body table table-bordered">
                           <table width="100%">
                            <thead>
                                <tr>
                                <td>Blood Group</td>
                                <td>Quantity</td>
                                <td>Presciption</td>
                                <td>Action</td>
                                </tr>
                            </thead>
                            


                           </table>
                     </div>
                  </div>

                  <div class="projects">
                  <div class="card">
                     <div class="card-header">
                          <h2> Blood Orders</h2>
                          
                     </div>
                     <div class="card-body">
                           <table width="100%">
                            <thead>
                                <tr>
                                    <td>Date</td>
                                    <td>Time</td>
                                    <td>Order Id</td>
                                    <td>Blood Group</td>
                                    <td>Price</td>
                                </tr>
                            </thead>
                            <tbody>
                           
                           </table>
                     </div>
                  </div>
            </div>

            </div>
</body>
</html>