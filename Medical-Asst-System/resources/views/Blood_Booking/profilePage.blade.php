

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/BloodBank/profile.css">
    <link rel="stylesheet" href="css/useravatar.css">
    @include('common_css');


 
</head>
<body>
     <!-- header section start -->
     <header class="header">
        <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>medcare</a>
        <div class="search-bar" id="srchbar-above">
            <button class="get-location btn" id="get-location-btn" style="width:50px;"><i class="fas fa-map-marker-alt"></i></button>
            <input type="text" placeholder="Search">
            <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
         <nav class="navbar">
            <a class="navlink" href="{{ route('home') }}">Home</a>
            <a class="navlink" href="{{ route('home') }}#services">Services</a>
            <a class="navlink" href="{{ route('home') }}#review">Review</a>
            <a class="navlink" href="#footer">contact Us</a>
        </nav>
        
         <!-- header section end -->
    <div class="search-navbar" id="srchbar-below">
        <div class="search-bar">
            <button class="get-location btn" id="get-location-btn" style="width:50px;"><i class="fas fa-map-marker-alt"></i></button>
            <input type="text" placeholder="Search...">
            <button class="srch-btn btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>

        
    <div class="user-avatar-container">
        <a href="" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar"></i></a>
        <h3> @if (session()->has('user_name'))
            {{session()->get('user_name')}}
            @else
             Gust
            @endif   
        </h3> 
    </div>
        <div id="menu-btn" class="fa fa-bars"> </div>
    </header>

    <!-- header section end -->

    <!-- user profile section start  -->
    <div class="profile_container">
        
        <div class="profile">
                  <img src="images/HomePage/profile.avif" alt="">
      <h3>{{session()->get('user_name')}}</h3>
      <a href="{{route('update_user_details')}}" class="p_btn">update profile</a>
      <a href="/orderHistory" class="btn-order">orders history</a>
      <a href="/logout" class="delete-btn">logout</a>
      <p>new <a href="{{route('user_login')}}">login</a> or <a href="/userReg">register</a></p>
    </div>
    
    <!-- user profile section end -->
</div>

<!-- about section start  -->
<section class="" id="footer">
        <div class="footer-top">
            <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>medcare</a>
            <div class="footer-txt">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta facilis maxime eius ad id qui quos quod corporis non minus! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro, voluptates 
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
    <!-- about section end-->
        
    <script src="js/profile.js"></script>
</body>
</html>