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
    <style>

.heading {
  font-size: 25px;
  margin-right: 25px;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */



#file {
  width: 100%; /* Adjust the width as needed */
  height: 20px; /* Adjust the height as needed */
  border-radius: 10px; /* Adjust the border radius as needed */
  background-color: #f0f0f0; /* Background color of the progress bar */
}

#file::-webkit-progress-bar {
  background-color: #f0f0f0; /* Background color of the progress bar container */
}
/* Individual bars */
.s5::-webkit-progress-value {
  background-color: #4caf50; /* Color of the progress bar */
  border-radius: 1px; /* Adjust the border radius as needed */
}

.s5::-moz-progress-bar {
  background-color: #4caf50; /* Color of the progress bar in Firefox */
}
.s4::-webkit-progress-value {
  background-color: #2196F3; /* Color of the progress bar */
  border-radius: 1px; /* Adjust the border radius as needed */
}

.s4::-moz-progress-bar {
  background-color: #2196F3; /* Color of the progress bar in Firefox */
}
.s3::-webkit-progress-value {
  background-color: #00bcd4; /* Color of the progress bar */
  border-radius: 1px; /* Adjust the border radius as needed */
}

.s3::-moz-progress-bar {
  background-color: #00bcd4; /* Color of the progress bar in Firefox */
}
.s2::-webkit-progress-value {
  background-color: #ff9800; /* Color of the progress bar */
  border-radius: 1px; /* Adjust the border radius as needed */
}

.s2::-moz-progress-bar {
  background-color: #ff9800; /* Color of the progress bar in Firefox */
}
.s1::-webkit-progress-value {
  background-color:  #f44336; /* Color of the progress bar */
  border-radius: 1px; /* Adjust the border radius as needed */
}

.s1::-moz-progress-bar {
  background-color: #f44336; /* Color of the progress bar in Firefox */
}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}
</style>

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
                <a href="{{route('check-availability')}}" class="btn">learn more <span class="fa fa-chevron-right"></span></a>
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
        @foreach($ratings as $rating)
        <div class="box">
            <img src="images/HomePage/profile.avif" alt="">
            <h3>{{$rating->user_name}}</h3>
        <div class="stars">
        <span class="fa fa-star @php if($rating->rating_value>=1){
        echo "checked";}@endphp"></span>
        <span class="fa fa-star @php if($rating->rating_value>=2){
        echo "checked";}@endphp"></span>
        <span class="fa fa-star @php if($rating->rating_value>=3){
        echo "checked";}@endphp"></span>
        <span class="fa fa-star @php if($rating->rating_value>=4){
        echo "checked";}@endphp"></span>
        <span class="fa fa-star @php if($rating->rating_value>=5){
        echo "checked";}@endphp"></span>
        <p class="text">{{$rating->rating_comment}}</p>
        </div>
        </div>
        @endforeach
        </div>
    </section>
@endsection
@section("js")
    <script src="js/HomePage/Home.js"></script>
    <script src="js/HomePage/sorav.js"></script>
    <script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.js"></script>
    <!-- JavaScript -->
    <!--Uncomment this line-->
    <script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/script.js"></script>
    <script src="js/HomePage/slider.js"></script>
        <script>
        function search() {
            var query = document.getElementById("searchInput").value.toLowerCase();
            var links = document.querySelectorAll("section"); // Select all navigation links

            links.forEach(function(link) {
                var text = link.textContent.toLowerCase(); // Get text content of the link
                if (text.includes(query)) {
                    link.style.display = "block"; // Show the link if it matches the search query
                } else {
                    link.style.display = "none"; // Hide the link if it doesn't match the search query
                }
            });}
            function search1() {
            var query = document.getElementById("searchInput1").value.toLowerCase();
            var links = document.querySelectorAll("section"); // Select all navigation links

            links.forEach(function(link) {
                var text = link.textContent.toLowerCase(); // Get text content of the link
                if (text.includes(query)) {
                    link.style.display = "block"; // Show the link if it matches the search query
                } else {
                    link.style.display = "none"; // Hide the link if it doesn't match the search query
                }
            });
        }
    </script>
@endsection