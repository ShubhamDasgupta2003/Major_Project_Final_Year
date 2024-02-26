<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blood Booking</title>

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
    @include('header1')

    @include('navlink')

    @include('header2')

   <!-- header section end -->

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
                        <a href='bookingForm.php?price=$arr[price]&B_b_id=$arr[blood_bank_id]&dist=$arr[distance]&bG=$arr[group_name]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn buy'>Buy</button></a>
                            <p class='card-fare'>&#8377 1350/-</p>
                        </div>
                    </div>
                </div>";
               
            </div>

    {{-- footer section  --}}
    @include('footer')
    <script src="js/BloodB/index.js"></script>
    <script src="js/BloodB/search.js"></script>
   
</body>
</html>