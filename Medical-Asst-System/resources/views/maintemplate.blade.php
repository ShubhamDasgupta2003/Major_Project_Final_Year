<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <!-- cdn link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- css -->
    @yield("css")
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/navLink.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="css/body_cont.css">
    <link rel="stylesheet" href="css/footer_style.css">
    <link rel="stylesheet" href="css/location_win.css">
    <!-- for slider  -->
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/HomePage/slider.css">

</head>
<body>
<header class="header">
    <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>&lt;EMAS&gt;</a>
    <div class="search-bar" id="srchbar-above">
        <button class="get-location btn" id="get-location-btn" style="width:50px;"><i class="fas fa-map-marker-alt"></i></button>

        <input type="text" id="searchInput" name="search"  placeholder="Search for services...">
        <button class="btn" onclick="search()"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    <!--navlinks-->
    <nav class="navbar">
    @hasSection('navbar')
    @yield("navbar")
    @else
    <a class="navlink" href="#home">Home</a>
    <a class="navlink" href="#services">Services</a>
    <a class="navlink" href="#review">Review</a>
    <a class="navlink" href="#footer">contact Us</a>
    @endif
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

    <main >
       @yield("main")
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
                                <h2>200 km</h2>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Location window popup ends here -->
    </main>
    
<!-- footer section start  -->
<footer>
    <section class="" id="footer"style="padding-left: 0px;padding-right: 0px;">
    <div class="footer-top">
        <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>&lt;EMAS&gt;</a>
        <div class="footer-txt">
            Emergency Medical Assistance System is provide many sevices and fullfill the user's need || &copy;2024 Emergency Medical Assistance System | All Rights Reserved 
        </div>
    </div>
    <div class="footer-bottom" id="footer">
        <div class="company-col footer-link-col">
            <h2>Company</h2>
            <ul>
                <li>About Company</li>
                <li>Customer's Speak</li>
                <li>In the News</li>
                <li>Terms and Conditions</li>
                <li>Privacy Policy</li>
                <li>Contact</li>
            </ul>
        </div>
        <div class="shopping-col footer-link-col">
            <h2>Shopping</h2>
            <ul>
                <li>Browse by Manufacturers</li>
                <li>Health Articles</li>
                <li>Offers / Coupons</li>
                <li>FAQs</li>
            </ul>
        </div>
        <div class="link-col footer-link-col">
            <h2>Useful Links</h2>
            <ul>
                <li>Home</li>
                <li>About us</li>
                <li>Services</li>
                <li>Contact us</li>
            </ul>
        </div>
    </div>
</section>
</footer>
    @yield("js")
    <script src="js/location.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/hambargericon"></script>

    
</body>
</html>