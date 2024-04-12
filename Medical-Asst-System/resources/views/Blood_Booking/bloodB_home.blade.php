<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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
            <input type="text" id="search" name="search"  placeholder="Search blood Group...">
            <button class="btn" id="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
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
    
    <section class="body-container">
      
        @if(Session::has('bloodB_search_result'))
        @php
            $banks = Session::get('bloodB_search_result');
        @endphp
    
        {{-- for loading --}}
        <div class="loadingOperations">
            <div id="loading" class="loader">
                <i class="fas fa-spinner fa-spin"></i>
            </div>
            <div id="loading-message"></div>
        </div>
        {{-- for loading --}}
    
        @if(count($banks) > 0)
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($banks as $bank)
                        <tr>
                            <td>{{ $bank->id }}</td>
                            <td>{{ $bank->name }}</td>
                            <td>{{ $bank->city }}</td>
                            <td>{{ $bank->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No banks found.</p>
        @endif
    
    @endif

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
    </section>

    <style>
        .loadingOperations {
            display: flex;
            width: 300px;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .loader {
            border: 8px solid #f3f3f3; /* Light grey */
            border-top: 8px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
            /* margin:0; */
            /* margin: auto;  Center the spinner */
            display: none; /* Initially hidden */
        }

        #loading-message {
            display: none; /* Initially hidden */
            text-align: center;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <script>
        $(document).ready(function () {
            $("#submit").on('click', function () {
                const value = $('#search').val();

                // Show loading spinner
                $("#loading").show();
                $("#loading-message").text("Please wait.").show();

                // Simulate loading time of 5 seconds
                setTimeout(function () {
                    // AJAX request
                    $.ajax({
                        url: "{{ route('searchtest') }}",
                        type: "GET",
                        data: {'search': value},

                        success: function (data) {
                            // Hide loading spinner
                            $("#loading").hide();
                            $("#loading-message").hide();

                            // Redirect to searchtest route
                            window.location.href = "{{ route('showBhome') }}";
                        },
                    });
                }, 3000); // 5-second delay
            });
        });
    </script>

    <script src="js/BloodB/index.js"></script>
    {{-- <script src="js/HomePage/location.js"></script> --}}
</body>

</html>
