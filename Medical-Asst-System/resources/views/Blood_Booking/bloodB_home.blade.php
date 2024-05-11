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
        <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>Medical a</a>
        
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
            <h3> @if (session()->has('user_name'))
                {{session()->get('user_name')}}
                @else
                 Gust
                @endif   
            </h3> 
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
  
    {{-- <div class="cards" id="bloodCard"></div> --}}
    @if(Session::has('bloodB_search_result'))
    @php
        $banks = Session::get('bloodB_search_result');
    @endphp

    @if(count($banks) > 0)
    <section class="body-container">
            <div class="contents">
                <div class="cards">
                    @foreach($banks as $bank)
                    <div class='card'>
                    <img src='images/BloodB/Blood_Bank.png'>
                    <div class='card-details'>
                    <h1 class='card-name'>{{$bank->name}}</h1>
                    <h2 class='card-address'><i class='fa-solid fa-location-dot'></i>{{$bank->city}}, {{$bank->state}}</h2>
                    
                    <div class='distance-gr'>
                        <p class='card-type'>Blood Group: <span class='blood-gr'>{{$bank->group_name}}</span></p>
                        <h2 class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 27 Km</h2>
                    </div>
                    <div class='buy-price'>
                      
                        <a href="{{ route('blood_booking_form', ['id' => $bank->id, 'name' => $bank->name,'city'=>$bank->city,'state'=>$bank->state,'blood_gr'=>$bank->group_name]) }}"><button class='btn buy'>Buy</button></a>
                        <p class='card-fare'>&#8377 {{$bank->price}}/-</p>
                        @php                          
                            Session::put('blood_price', $bank->price);
                        @endphp

                    </div>
                    </div>
                    </div>
                 @endforeach       
                 @php
                     
                     Session::put('bloodB_search_result', null);
                 @endphp
                </div>         
            </div>
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
       /* .user-avatar-container h3 {
        color: #00a896;
        font-size: 20px;
        /* padding-top: 20px; */
    } */
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
                            console.log(data);
                            // Redirect to searchtest route
        
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

 {{-- <script src="js/BloodB/search.js"></script> --}}
 <script>
    $(document).ready(function(){
        $("#submit").on('click', function(){
            const value = $('#search').val();

            // Make AJAX request
            $.ajax({
                url: "/showBhome",
                type: "GET",
                data: {'search': value},
                success: function(data){
                    // console.log(data);
                    // let banks = data.banks;
                    // let html = '';

                    window.location.href = "{{ route('showBhome') }}";
                    // if (banks.length > 0) {
                    //     for (let i = 0; i < banks.length; i++) {
                    //         html += `
                    //             <div class='card'>
                    //                 <img src='images/BloodB/Blood_Bank.png'>
                    //                 <div class='card-details'>
                    //                     <h1 class='card-name'>${banks[i].name}</h1>
                    //                     <h2 class='card-address'><i class='fa-solid fa-location-dot'></i>${banks[i].city}, ${banks[i].state}</h2>
                                        
                    //                     <div class='distance-gr'>
                    //                         <p class='card-type'>Blood Group: <span class='blood-gr'>${banks[i].group_name}</span></p>
                    //                         <h2 class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 27 Km</h2>
                    //                     </div>
                    //                     <div class='buy-price'>
                    //                         <a href='${banks[i].booking_form_route}'><button class='btn buy'>Buy</button></a>
                    //                         <p class='card-fare'>&#8377 ${banks[i].price}/-</p>
                    //                     </div>
                    //                 </div>
                    //             </div>`;
                    //     }
                    // } else {
                    //     html += '<div class="card-details"><p class="card-fare" style="text-align: center;">Data not found</p></div>';
                    // }

                    // // Append generated HTML to the container
                    // $("#bloodCard").html(html);
                },
               
            });
        });
    });
</script>

<script src="js/BloodB/index.js"></script>
{{-- <script src="js/HomePage/location.js"></script> --}}