<?php
    // include_once("db_config/main_config.php");

    // $db = new Database();       //Creating object of Databse class
    // $con = $db->connect();      //Calling connect() method

    // session_start();
    // $db->isLoggedIn($_SESSION['is_logged_in']);          //Checking login status

    // //Backend for location modification starts here
    // setcookie("loc_modify","false");

    // $uid =  $_SESSION['user_id'];
    // $ufname =  $_SESSION['user_fname'];
    // $ulname = $_SESSION['user_lname'];

    // $lat_in_use = 0.0;
    // $lon_in_use = 0.0;
    // $full_address = "";
    // $loc_query = "SELECT lat_in_use,long_in_use,formatted_adrrs FROM user_info WHERE user_id='$uid'";

    // $loc_result = $con->query($loc_query);
    // $loc_rows = $loc_result->fetch_assoc();

    // if($loc_result)
    // {
    //     $lat_in_use = $loc_rows['lat_in_use'];
    //     $lon_in_use = $loc_rows['long_in_use'];
    //     $full_address = $loc_rows['formatted_adrrs'];
    // }
    // else
    // {
    //     echo "error";
    // }

    // if(@$_COOKIE['loc_modify'] == 'true')
    // {
    //     $mod_lat = $_COOKIE['lat_in_use'];
    //     $mod_lon = $_COOKIE['lon_in_use'];
    //     $mod_addrs = $_COOKIE['address_in_use'];

    //     $loc_mod_query = "UPDATE user_info SET lat_in_use=$mod_lat,long_in_use=$mod_lon,formatted_adrrs='$mod_addrs' WHERE user_id='$uid'";

    //     $mod_loc_result = mysqli_query($con,$loc_mod_query);

    //     if($mod_loc_result)
    //     {
    //         header("Refresh: 1");
    //     }
    // }
    // //Backend for location modification ends here
    //   //Query for displaying results on screen

    // $amb_filter_query = "free";

    // if(@$_GET['q'])
    // {
    //     $amb_filter_query = $_GET['q'];
    // }
    // else
    // {
    //     $amb_filter_query = "free";
    // }
    // // $search_filter = ;
    // $sqli_table = 'medtech_emp em INNER JOIN medtech_org om
    // ON em.org_id = om.org_id';
    // $sqli_rows = "`ename`, `salary`,`eid`,`org_name`,`org_lmark`,ROUND((
    //     6371 *
    //     acos(cos(radians($lat_in_use)) * 
    //     cos(radians(org_location_lat)) * 
    //     cos(radians($lon_in_use) - 
    //     radians(org_location_long)) + 
    //     sin(radians($lat_in_use)) * 
    //     sin(radians(org_location_lat)))
    // ),1) AS distance";

    // $sqli_condition = "(ename LIKE '$amb_filter_query%' OR e_status='$amb_filter_query' OR org_name='$amb_filter_query' OR org_dist='$amb_filter_query') AND org_type='m'";
    // $sqli_order = 'distance';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician</title>
    <!-- cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <!-- css -->
    @include('common_css')
    <link rel="stylesheet" href="css/cont-card.css">
    <link rel="stylesheet" href="css/mininav.css">
</head>
<body>
    <!-- header section start -->
    @include('header')
    <!-- header section end -->
    <section class="body-container">
        <div>
            <nav class="segmented-navigation">
                <a href="/aya" class="segmented-item">Aya</a>
                <a href="/nurse" class="segmented-item">Nurse</a>
                <a href="/technician" class="segmented-item active">Technician</a>
              </nav>
            </div>
        <div class="contents">

            <!-- Your content goes here | check body_cont.css file for css property-->
             <div class="cards">
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
            </div></div>
            
     <!-- Location window popup starts here -->
     <div class="location-window" id="loc-win">
                <div class="card popup">
                    <button class="dismiss-btn" id="dismiss">&times</button>
                    <div class="loc-head">
                        <span>Enter an Indian pincode here</span>
                        <div class="loc-option-tab">
                            <input type="number" name="pincode" placeholder="Pincode here" id="zipcode">
                            <button class="btn" id="pin-apply">Apply</button>
                        </div>
                    </div>
                    <div class="loc-head">
                        <span>Allow to access your location</span>
                        <div class="loc-option-tab">
                            <button class="get-location btn" id="det-location"><i class="fa-solid fa-location-crosshairs"></i>Detect my location</button>
                        </div>
                    </div>
                    <div class="loc-head">
                        <div class="loc-option-tab">
                            <label for="" id="location-txt">
                                <?php
                                    // echo "$full_address";
                                ?>
                                <h3>Ramesh</h3>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Location window popup ends here -->
        </div>
    </section>
    @include('footer')
    <script src="js/location.js"></script>
    <script src="js/hambargericon.js"></script>
    <script src="search_medtech.js"></script>
</body>
</html>