<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulance Service|24x7|Instant Booking</title>
    <!-- cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- css -->
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navLink.css') }}" rel="stylesheet">
    <link href="{{ asset('css/media.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer_style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/body_cont.css') }}" rel="stylesheet">
    <link href="{{ asset('css/location_win.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cont-card.css') }}" rel="stylesheet">
    <link href="{{ asset('css/useravatar.css') }}" rel="stylesheet">

</head>
<body>
    <!-- header section start -->
    <header class="header">
        <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>medcare</a>
        <div class="search-bar" id="srchbar-above">
            <button class="get-location btn" id="get-location-btn"><i class="fas fa-map-marker-alt"></i></button>
            <input type="text" id="search_val" placeholder="Search ambulance location name...">
            <button class="btn" id="search_amb"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <nav class="navbar">
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/index.php">Home</a>
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/index.php#services">Services</a>
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/index.php#review">Review</a>
            <a class="navlink" href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/HomePage/index.php#footer">Contact Us</a>
        </nav>
        <div class="user-avatar-container">
        <a href="http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/HomePage/profile.php" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar"></i></a>
                
            <h3>Shubham</h3>

        </div>
        <div id="menu-btn" class="fa fa-bars"> </div>
    </header>

    <!-- header section end -->
    <div class="search-navbar" id="srchbar-below">
        <div class="search-bar">
            <button class="get-location btn" id="get-location-btn"><i class="fas fa-map-marker-alt"></i></button>
            <input type="text" id="search_val" placeholder="Search ambulance location name...">
            <button class="srch-btn btn" id="search_amb"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>

    <section class="body-container">
        <div class="contents">

            <!-- Your content goes here | check body_cont.css file for css property-->
            <div class="cards">
                        <div class='card' id='amb_card'>
                        <img src='https://images.jdmagicbox.com/comp/varanasi/e9/0542px542.x542.200517114047.g7e9/catalogue/narayan-ambulance-service-varanasi-cantt-varanasi-0jqwifqqzh.jpg?clr=' >
                        <div class='card-details'>
                            <p class='card-name'>ABC Ambulance servicee</p>
                            <p class='card-address'><i class='fa-solid fa-location-dot'></i> West Bengal 24 Pgs(N)
                            </p>
                            <div class='card-row'>
                                <p class='card-type'>Normal</p>
                                
                            </div>
                            <div class='card-row'>
                                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i>7 Km</p>
                                <p class='card-fare'>200/- per hr</p>
                            </div>
                            <div class='card-row'>
                                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/Ambulance Service/amb_booking_form.php?ambno=$rows[amb_no]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&amb_fare=$amb_fare&book_adrs=$full_address'><button class='btn btn-secondary-orange' id='book_btn'>Book ride</button></a>
                                <p id='card-status'>Active</p>
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
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Location window popup ends here -->

            <!-- Footer bar -->
            <footer>
                <div class="footer-top">
                    <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>medcare</a>
                    <div class="footer-txt">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta facilis maxime eius ad id qui quos quod corporis non minus! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro, voluptates 
                    </div>
                </div>
                <div class="footer-bottom">
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
            </footer>
        <!-- contents class ends here -->
        </div>
    </section>
    <script src="{{ asset('js/amb_booking.js') }}"></script>
    <script src="{{ asset('js/location.js') }}"></script>
    <script src="{{ asset('js/amb_status.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
</body>
</html>