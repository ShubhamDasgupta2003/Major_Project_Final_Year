<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- cdn link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


   
    <!-- css -->
   
    <link rel="stylesheet" href="css/HomePage/BloodBooking/style.css">
    <link rel="stylesheet" href="css/HomePage/home.css">
    <link rel="stylesheet" href="css/HomePage/sourav.css">
    @include('common_css')
    <link rel="stylesheet" href="css/HomePage/cont-card.css">

   
    <!-- for slider  -->
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/HomePage/slider.css">

</head>
<body>
    <!-- header section start -->
   <!-- header section start -->
<header class="header">
    <a href="#" class="logo"><i class="fa-solid fa-heart-pulse"></i>Medical Assistant</a>
    <div class="search-bar" id="srchbar-above">
        <button class="get-location btn" id="get-location-btn" style="width:50px;"><i class="fas fa-map-marker-alt"></i></button>

        <input type="text" id="searchInput" name="search"  placeholder="Search for services...">
        <button class="btn" onclick="search()"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    <!--navlinks-->
    <nav class="navbar">
    <a class="navlink" href="#home">Home</a>
    <a class="navlink" href="#services">Services</a>
    <a class="navlink" href="#review">Review</a>
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
   <!-- header section start -->

    <!-- sourav-section-start -->
    <main >
        <section class="sourav" id="home">
            <div class="firstsection">
                <div class="leftsection">
                    Hi, We are here
                    <div class="">to <span>connect</span></div> you to
                    <span id="element"></span>
                </div>
                <div class="rightsection">
                    <img src="images/HomePage/medIimage.png"  alt="">
                </div>
            </div>
        </section>
    </main>
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>

    <!-- sourv-section-end  -->
    
    <!-- slider-section start  -->
    <section class="sliderS">
        <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                   
                    
                    <div class="Scard swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
    
                            <div class="Scard-image">
                                <img src="images/HomePage/Hospital wheelchair-bro.svg" alt="" class="card-img">
                            </div>
                        </div>
    
                        <div class="card-content">
                            <h2 class="name">Your Health Our Priority
                            </h2>
                            <p class="description">We are Here For You</p>
    
                            <!-- <button class="button">View More</button> -->
                        </div>
                    </div>
                    <div class="Scard swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
    
                            <div class="Scard-image">
                                <img src="images/HomePage/Blood_Bank.avif" alt="" class="card-img">
                            </div>
                        </div>
    
                        <div class="card-content">
                            <h2 class="name">Searching For Blood 
                            </h2>
                            <p class="description">Search which bloodbank is suitable for you</p>
    
                            <!-- <button class="button">View More</button> -->
                        </div>
                    </div>
                    <div class="Scard swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
    
                            <div class="Scard-image">
                                <img src="images/HomePage/pharmaci.avif" alt="" class="card-img">
                            </div>
                        </div>
    
                        <div class="card-content">
                            <h2 class="name">Get Supplies
                            </h2>
                            <p class="description">Medical Supplies At Your Doorstep</p>
    
                            <!-- <button class="button">View More</button> -->
                        </div>
                    </div>
                    <div class="Scard swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
    
                            <div class="Scard-image">
                                <img src="images/HomePage/ambulance_book.png" alt="" class="card-img">
                            </div>
                        </div>
    
                        <div class="card-content">
                            <h2 class="name">Ambulance Few Clicks Away
                            </h2>
                            <p class="description">At Your Service</p>
    
                            <!-- <button class="button">View More</button> -->
                        </div>
                    </div>
                    <div class="Scard swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
    
                            <div class="Scard-image">
                                <img src="images/HomePage/few_click.jpg" alt="" class="card-img">
                            </div>
                        </div>
    
                        <div class="card-content">
                            <h2 class="name">Time Is Precious
                            </h2>
                            <p class="description">Book a Bed In Hospital Almost Instantly</p>
    
                            <!-- <button class="button">View More</button> -->
                        </div>
                    </div>
                    <div class="Scard swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>
    
                            <div class="Scard-image">
                                <img src="images/HomePage/trust.jpg" alt="" class="card-img">
                            </div>
                        </div>
    
                        <div class="card-content">
                            <h2 class="name">Wary Of Strangers
                            </h2>
                            <p class="description">Our Review System will Take Care Of It</p>
    
                            <!-- <button class="button">View More</button> -->
                        </div>
                    </div>
                  
                </div>
            </div>
    
            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>
</section>
    <!-- slider-section end  -->

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
    
     <!-- service section start -->
     <section class="services" id="services" >
        <h1 class="heading">Our <span>services</span></h1>
        <div class="box-container">
        
            <div class="box">
                <img src="images/HomePage/ambulance.png" alt="">
                <h3>24x7 Ambulance</h3>
                <p> soluta a, pariatur dolore odit vadipisci fugiat.</p>
                <a href="{{route('ambulance_home')}}" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>

           <div class="box">
                <img src="images/HomePage/blood-bag.png" alt="">
                <h3>Book Blood </h3>
                <p> soluta a, pariatur dolore odit vadipisci fugiat.</p>
                <a href="{{route('bloodB_home')}}" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>

            <div class="box">
                <img src="images/HomePage/hospital.png" alt="">
                <h3>Book Hospital Bed </h3>
                <p>Efficiently book hospital beds online for immediate medical care access.</p>
                <a href="" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>

            <div class="box">
                <img src="images/HomePage/babysitter.png" alt="">
                <h3>Aya</h3>
                <p> soluta a, pariatur vadipisci i hi jkl  ljl;a fugiat vadipisci.</p>
                <a href="{{route('aya_home')}}" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>
            <div class="box">
                <img src="images/HomePage/nurse.png" alt="">
                <h3>Nurse</h3>
                <p> soluta a, pariatur dolore fsf fsaf afsaf fsaf fsaf fsaf fasf .</p>
                <a href="{{route('nurse_home')}}" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>
            <div class="box">
                <img src="images/HomePage/radiologist.png" alt="">
                <h3>Medical Technician</h3>
                <p> soluta a, pariatur dolore odit vadipisci fugiat.</p>
                <a href="{{route('technician_home')}}" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>
            <div class="box">
                <img src="images/HomePage/medicine.png" alt="">
                <h3>Buy Medicine 24x7</h3>
                <p> soluta a, pariatur dolore odit vadipisci fugiat.</p>
                <a href="" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>
            <div class="box">
                <img src="images/HomePage/oxygen.png" alt="">
                <h3>Oxygen</h3>
                <p> soluta a, pariatur dolore odit vadipisci fugiat.</p>
                <a href="" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>

          

        </div>

    </section>
    <!-- service section end -->
     <!-- review section start  -->
     <section class="review" id="review">
        <h1 class="heading">client's <span>review</span></h1>
        <div class="box-container">

            
            <div class="box">
                <img src="images/HomePage/profile.avif" alt="">
                <h3>Jagannath Sarkar</h3>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <!-- <i class="fa fa-star-half-alt"></i> -->
                    <p class="text">Lorem ipsum dolodipisicing elit. Voluptatum est facere corrupti ipsa, enim culpa omnis reprehenderit unde. Eum laboriosam esse tenetur veritatis, a dolorem voluptate quam veniam !</p>
                </div>
            </div>
            <div class="box">
                <img src="images/HomePage/profile.avif" alt="">
                <h3>Jagannath Sarkar</h3>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <!-- <i class="fa fa-star-half-alt"></i> -->
                    <p class="text">Lorem ipsum dolodipisicing elit. Voluptatum est facere corrupti ipsa, enim culpa omnis reprehenderit unde. Eum laboriosam esse tenetur veritatis, a dolorem voluptate quam veniam !</p>
                </div>
            </div>
            <div class="box">
                <img src="images/HomePage/profile.avif" alt="">
                <h3>Jagannath Sarkar</h3>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <!-- <i class="fa fa-star-half-alt"></i> -->
                    <p class="text">Lorem ipsum dolodipisicing elit. Voluptatum est facere corrupti ipsa, enim culpa omnis reprehenderit unde. Eum laboriosam esse tenetur veritatis, a dolorem voluptate quam veniam !</p>
                </div>
            </div>
            <div class="box">
                <img src="images/HomePage/profile.avif" alt="">
                <h3>Jagannath Sarkar</h3>
                <div class="stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <!-- <i class="fa fa-star-half-alt"></i> -->
                    <p class="text">Lorem ipsum dolodipisicing elit. Voluptatum est facere corrupti ipsa, enim culpa omnis reprehenderit unde. Eum laboriosam esse tenetur veritatis, a dolorem voluptate quam veniam !</p>
                </div>
            </div>    
        </div>
    </section>

    
    <!-- footer section start  -->
    @include('footer')
    <script src="js/HomePage/location.js"></script>
    <script src="js/HomePage/Home.js"></script>
    <script src="js/HomePage/sorav.js"></script>
    
    <script src="js/HomePage/slider.js"></script>
    <script src="js/HomePage/search.js"></script>
    <script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.js"></script>

    <!-- JavaScript -->
    <!--Uncomment this line-->
    <script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/script.js"></script>
    <script src="js/HomePage/slider.js"></script>
</body>
</html>