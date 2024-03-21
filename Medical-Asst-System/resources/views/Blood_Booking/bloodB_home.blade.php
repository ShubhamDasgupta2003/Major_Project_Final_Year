
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

     <!-- css for this page -->
     <link rel="stylesheet" href="css/BloodBank/Bb.css">
     <link rel="stylesheet" href="css/useravatar.css">
     <!-- css -->
     <link rel="stylesheet" href="css/BloodBank/navbar.css">
     <link rel="stylesheet" href="css/BloodBank/navLink.css">
     <link rel="stylesheet" href="css/BloodBank/media.css">
     <link rel="stylesheet" href="css/BloodBank/body_cont.css">
     <link rel="stylesheet" href="css/BloodBank/footer_style.css">
     <link rel="stylesheet" href="css/BloodBank/location_win.css">
     <link rel="stylesheet" href="css/BloodBank/cont-card.css">
 



</head>

<body>
    <!-- header section start -->
     @include('header')

    <!-- header section end -->
    <div class="search-navbar" id="srchbar-below">
        <div class="search-bar">
            <button class="get-location btn" id="get-location-btn" style="width:50px;"><i
                    class="fas fa-map-marker-alt"></i></button>
            <!-- <input type="text" name="s_value" placeholder="Search...">
            <button class="srch-btn btn" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button> -->

            <input type="text" id="searchInput1" name="search"  placeholder="Search blood group">
            <button class="srch-btn btn" onclick="search1()"><i class="fa-solid fa-magnifying-glass"></i></button>
            <!-- <button ></button> -->

        </div>
    </div>
    <section class="body-container">
        <div class="contents">


            <!-- Your content goes here | check body_cont.css file for css property-->
            <div class="cards">
                <div class='card'>
                <img src='images/BloodB/Blood_Bank.png'>
                <div class='card-details'>
                    <h1 class='card-name'>ABC BloodBank</h1>
                    <h2 class='card-address'> <i class='fa-solid fa-location-dot'></i>Badkulla,Nadia,westBengal</h2>
                   
                    <div class='distance-gr'>
                        <p class='card-type'>Blood Group: <span class='blood-gr'>O+</span></p>
                        <h2 class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 27 Km</h2>

                    </div>
                    <div class='buy-price'>
                    <a href=' {{route('blood_booking_form')}}'><button class='btn buy'>Buy</button></a>
                        <p class='card-fare'>&#8377 1350/-</p>
                    </div>
                </div>
            </div>
           
        </div>

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
                                <H2>West Bengal Nadia Taherpur - 741159</H2>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Location window popup ends here -->
                <!-- contents class ends here -->
            @include('/Blood_Booking/servicefooter')
        </div>
    </section>


    
 
  
    <!-- <script src="search1.js"></script> -->
    <script src="js/BloodB/index.js"></script>
    <script src="js/BloodB/search.js"></script>
    <script src="js/HomePage/location.js"></script>
</body>

</html>


