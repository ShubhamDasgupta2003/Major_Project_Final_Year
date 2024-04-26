@extends("maintemplate")
@section("title")
Home Page
@endsection
@section("css")
    <link rel="stylesheet" href="css/HomePage/BloodBooking/style.css">
    <link rel="stylesheet" href="css/HomePage/home.css">
    <link rel="stylesheet" href="css/HomePage/sourav.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/navLink.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="css/body_cont.css">
    <!-- <link rel="stylesheet" href="css/location_win.css"> -->
    <link rel="stylesheet" href="css/cont-card.css">
    <link rel="stylesheet" href="css/useravatar.css">

@endsection
@section("navbar")
    <a class="navlink" href="#home">Home</a>
    <a class="navlink" href="#services">Services</a>
    <a class="navlink" href="#review">Review</a>
    <a class="navlink" href="#footer">contact Us</a>
@endsection
@section("main")
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
    <!-- service section start -->
     <section class="services" id="services" >
        <h1 class="heading">Our <span>services</span></h1>
        <div class="box-container">
        
            <div class="box">
                <img src="images/HomePage/ambulance.png" alt="">
                <h3>24x7 Ambulance</h3>
                <p>For More Information About This Service, Please Click On Learn More. </p>
                <a href="#" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>

           <div class="box">
                <img src="images/HomePage/blood-bag.png" alt="">
                <h3>Book Blood </h3>
                <p>For More Information About This Service, Please Click On Learn More. </p>
                <a href=" {{route('showBhome')}} " class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>

            <div class="box">
                <img src="images/HomePage/hospital.png" alt="">
                <h3>Book Hospital Bed </h3>
                <p>For More Information About This Service, Please Click On Learn More.</p>
                <a href="{{route('hos_bed')}}" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>

            <div class="box">
                <img src="images/HomePage/babysitter.png" alt="">
                <h3>Aya</h3>
                <p>For More Information About This Service, Please Click On Learn More. </p>
                <a href="{{route('aya_home')}}" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>
            <div class="box">
                <img src="images/HomePage/nurse.png" alt="">
                <h3>Nurse</h3>
                <p>For More Information About This Service, Please Click On Learn More. </p>
                <a href="{{route('nurse_home')}}" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>
            <div class="box">
                <img src="images/HomePage/radiologist.png" alt="">
                <h3>Technician</h3>
                <p>For More Information About This Service, Please Click On Learn More. </p>
                <a href="{{route('technician_home')}}" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>
            <div class="box">
                <img src="images/HomePage/medicine.png" alt="">
                <h3>Buy Medicine 24x7</h3>
                <p> For More Information About This Service, Please Click On Learn More.</p>
                <a href="" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
            </div>
            <div class="box">
                <img src="images/HomePage/oxygen.png" alt="">
                <h3>Oxygen</h3>
                <p> For More Information About This Service, Please Click On Learn More.</p>
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
@endsection
@section("js")
    <script src="js/HomePage/Home.js"></script>
    <script src="js/HomePage/sorav.js"></script>
    <script src="js/HomePage/search.js"></script>
    <script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.js"></script>
    <!-- JavaScript -->
    <!--Uncomment this line-->
    <script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/script.js"></script>
    <script src="js/HomePage/slider.js"></script>
@endsection