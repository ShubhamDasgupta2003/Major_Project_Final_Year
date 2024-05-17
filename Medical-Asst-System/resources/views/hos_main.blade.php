<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bed Booking Service|24x7</title>
    <!-- cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,200" />

    <!-- css -->
    <link href="{{ asset('css/BedBook/body_cont.css') }}" rel="stylesheet">
    <link href="{{ asset('css/BedBook/confirmation.css') }}" rel="stylesheet">
    <link href="{{ asset('css/BedBook/cont_card.css') }}" rel="stylesheet">
    <link href="{{ asset('css/BedBook/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/BedBook/form_book.css') }}" rel="stylesheet">
    <link href="{{ asset('css/BedBook/hosp_register.css') }}" rel="stylesheet">
    <link href="{{ asset('css/BedBook/location.css') }}" rel="stylesheet">
    <link href="{{ asset('css/BedBook/media.css') }}" rel="stylesheet">
    <link href="{{ asset('css/BedBook/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/BedBook/navlink.css') }}" rel="stylesheet">
    <link href="{{ asset('css/useravatar.css') }}" rel="stylesheet">

</head>

<body>
    <!-- header section start -->
    <header class="header">
        <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>medcare</a>
        <div class="search-bar" id="srchbar-above">
            <button class="get-location btn" id="get-location-btn"><i id="locationlogo" class="fas fa-map-marker-alt"></i> </i></button>
            <input id="searchbar" onkeyup="search_hos_name()" name="search" type="text" placeholder="Search...">
            <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <nav class="navbar">
            <a class="navlink" href="{{route('home')}}">Home</a>
            <a class="navlink" href="{{route('home')}}">Services</a>
            <a class="navlink" href="{{route('home')}}">Review</a>
            <a class="navlink" href="{{url('/hos_register')}}">New Register</a>
        </nav>
        
        <!-- <a href="#" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar"></i></a> -->
        <div class="user-avatar-container">
        <a href="http://localhost/Minor%20Project%205th_Sem/Emergency_Medical_Support_System/HomePage/profile.php" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar"></i></a>
            
                
                <h3>Sourav</h3>
            

        </div>
        <div id="menu-btn" class="fa fa-bars"> </div>

        <div id="menu-btn" class="fa fa-bars"> </div>
    </header>

    <!-- header section end -->
    <div class="search-navbar" id="srchbar-below">
        <div class="search-bar">
            <button class="get-location btn" id="get-location-btn"><i id="locationlogo" class="fas fa-map-marker-alt"></i></button>
            <input type="text" placeholder="Search...">
            <button class="srch-btn btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>

    <section class="body-container">
        <div class="contents">

            <!-- Your content goes here | check body_cont.css file for css property-->
            <div class="cards">
                @foreach($hos_data as $hos)
                        <div class='card'>
                        <img src="{{asset('images/BedBook/hospital.jpg')}}">
                        <div class='card-details'>
                            <p class='card-name'>{{$hos->hos_name}}</p>
                            <p class='card-address'>{{$hos->hos_address}}</p>
                            <p class='card-type-male'>
                                <span class='material-symbols-outlined'>
                                    man
                                    </span>
                                <strong class='bed-zero'>{{$hos->hos_male_bed_available}}</strong>
                            </p>
                            <p class='card-type-female'>
                                <span class='material-symbols-outlined'>
                                    woman
                                    </span>
                                <strong class='bed-zero'>{{$hos->hos_female_bed_available}}</strong>
                            </p>
                        <div class='card-row' >
                            <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i>{{$hos->hos_city}}</p>
                                 <p class='card-fare'>&#8377 {{$hos->hos_bed_charge}}/-</p>
                            <a href="{{route('display.hos.info', ['id' => $hos->hos_id])}}">
                                Book Bed
                                {{-- <button id='c1' class='btn btn-secondary-orange'>Book Bed</button> --}}
                            </a>
                        </div>
                        </div>
                    </div>
                    @endforeach
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
            <!-- Footer bar -->
            <footer>
                <div class="footer-top">
                    <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>medcare</a>
                    <div class="footer-txt">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta facilis maxime eius ad id qui
                        quos quod corporis non minus! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro,
                        voluptates
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
    {{-- <script src="{{ asset('js/amb_booking.js') }}"></script>
    <script src="{{ asset('js/location.js') }}"></script>
    <script src="{{ asset('js/amb_status.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script> --}}
    <script src="{{ asset('js/BedBook/location.js') }}"></script>
    <script src="{{ asset('js/BedBook/bbs.js') }}"></script>
</body>

</html>