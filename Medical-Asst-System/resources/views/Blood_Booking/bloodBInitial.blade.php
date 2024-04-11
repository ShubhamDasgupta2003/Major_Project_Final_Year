
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
    <header class="header">
        <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>Medical Assistant</a>
        <div class="search-bar" id="srchbar-above">
            <button class="get-location btn" id="get-location-btn" style="width:50px;"><i class="fas fa-map-marker-alt"></i></button>
    
            <input type="text" id="searchInput" name="search"  placeholder="Search blood group">
            <button class="srch-btn btn" onclick="search()"><i class="fa-solid fa-magnifying-glass"></i></button>

        </div>
        <!--navlinks-->
        <nav class="navbar">
        <a class="navlink" href="{{ route('home') }}">Home</a>
        <a class="navlink" href="{{ route('home') }}#services">Services</a>
        <a class="navlink" href="{{ route('home') }}#review">Review</a>
        <a class="navlink" href="#footer">contact Us</a>
        </nav>
        <!--user avtar-->
        <div class="user-avatar-container">
        <a href="profile.php" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar"></i></a>
                {{-- echo"<h3>$_SESSION[user_fname]</h3>";
                echo "<input type='hidden' id='session_val' value=1>";
                echo"<h3>Guest</h3>";
                echo "<input type='hidden' id='session_val' value=0>"; --}} 
    </div>
    <div id="menu-btn" class="fa fa-bars"> </div>
    </header>
    <div class="search-navbar" id="srchbar-below">
    <div class="search-bar">
        <button class="get-location btn" id="get-location-btn" style="width:50px;"><i class="fas fa-map-marker-alt"></i></button>
        <input type="text" id="searchInput1" name="search"  placeholder="Search ...">
        <button class="btn" onclick="search1()"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    </div>

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


