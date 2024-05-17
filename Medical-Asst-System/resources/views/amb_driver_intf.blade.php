<!DOCTYPE html>
<html>
<head>
    <title>Geolocation</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');

        
        .marker-btn {
            background-color: green;
            color: white;
            font-weight: bold;
            border: 0px solid white;
            border-radius: 5px;
            cursor: pointer;
        }
        .leaflet-marker-icon.ptn-marker {
            border:5px solid red;
        }
        .navbar
        {
            /* background-color:rgb(0,120,232); */
            padding-right:1rem;
        }
        .profile
        {
          color:blue;
        }
        .links a
        {
            text-decoration:none;
            margin-right:2rem;
            font-size:17px;
            font-family: "Ubuntu", sans-serif;
            font-weight: 400;
            font-style: normal;
            color: #217bff;
            padding:1.3rem;
        }
        .links a:hover
        {
            font-size: 19px;
            /* background-color: #217bff; */
            /* color: white; */
        }
        .logo
        {
            color: rgb(68, 68, 68);
            text-decoration: none;
            font-size: 1.7rem;
            margin-left: 7px;
        }
    </style>

</head>

<body>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure to want to decline the ride request?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <p class="form-text">Once you decline the ride, you will not be able to accept ride and your account will get automatically deactivated. You will activate your account when you are ready to accept rides</p>
            </div>
            <div class="col-md-12 text-center">
                <button class="btn btn-success" type="button" id="dcln_rqst">Yes</button>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        <nav class="navbar navbar-light container-fluid bg-light shadow-sm p-1  bg-body rounded">
            
        <a href="#" class="logo"><i class="fa-solid fa-heart-pulse" style="color: #00a896;"></i>Medilities</a>

            <div class="row">
                <div class="col-md-12 mr-5 ml-5 links">
                <a href="#">Home</a>
                <a href="#">Services</a>
                <a href="#">Review</a>
                <a href="#">Contact us</a>
                </div>
                
            </div>
            <div class="d-flex">
                <h2 class="me-2 text-light"> 
                <!-- Example single danger button -->
                <div class="btn-group dropstart profile">
                <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="row">
                        <div class="col-1">
                        <i class="fa-regular fa-user fa-xl" style="color: #0470ce;"></i>
                    </div>
                </button>
                <ul class="dropdown-menu">
                    <li><h4 class="dropdown-item">{{$amb_record['amb_driver_name']}}</h4></li>
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> My Profile</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-money-check-dollar"></i> My Earnings</a></li>
                    <li><a class="dropdown-item"><button class="btn btn-danger" id="take_break"><i class="fa-solid fa-moon"></i> Take break</button></a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><button class="btn" id="logout"><i class="fa-solid fa-power-off"></i> Logout</button></li>
                </ul>
                <!--  -->
                </div>
            </h2>
            </div>
        </div>
        </nav>
        <div class="container-fluid row">
            <div class="left-panel col-md-5 border overflow-auto">
                <div class="patient-card-body" id="patient-card">
                        <!-- Card header begins -->
                        <div class="card-body mt-5 bg-light pt-5 pb-5 shadow-lg p-3 mb-5 bg-body rounded">
                            <h3 class="card-title text-dark text-center mb-2" id="ptn_name">
                            <i class="fa-solid fa-map-location-dot fa-fade fa-lg" style="color: #0087db;"></i>
                            Please wait getting rides...</h3>
                            <h6 class="card-subtitle mb-2 text-dark" id="ptn_booking_addrs"></h6>
                            <h5 id="arrow" class="text-center"></h5>
                            <h6 class="card-subtitle mb-2 text-dark" id="ptn_dstn_addrs"></h6>
                            <h5 id="ptn_mobile" class="text-dark"></h5>
                            <div class="row">
                                <div class="col">
                                    <h5 id="acpt_ride_btn"></h5>
                                </div>
                                <div class="col">
                                <h5 id="dcln_ride_btn"></h5>
                                </div>
                            </div>
                        </div>
                        <!-- Card header ends -->
                </div>
                <div class="inactive-card" id="inactive-card">
                <div class="card-body mt-5 pt-5 pb-5 shadow-lg p-3 mb-5 bg-danger rounded">
                            <h3 class="card-title text-light text-center mb-2" id="ptn_name"><i class="fa-solid fa-triangle-exclamation" style="color: #ffffff;"></i>
                            Your account is curently inactive</h3>
                            <h3 class="form-text text-center text-light mt-2">To activate yourself again <a href="/driver-activate?amb_no={{$amb_record->amb_no}}">click here</a></h3>
                            <h6 class="card-subtitle mb-2 text-dark" id="ptn_booking_addrs"></h6>
                        </div>
                </div>
            </div>
            <div class="col-md-7">
                <div id="map" style="width: 57vw; height: 93vh" class="border"></div>
            </div>
    </div>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
             $(document).ready(function(){
                $('#inactive-card').hide();
                var amb_status = "{{$amb_record->amb_status}}";
                console.log(amb_status);
                if(amb_status=='inactive')
                {
                    $('#patient-card').hide();
                    $('#inactive-card').show();
                    $('#take_break').prop("disabled",true);
                }
            $('#dcln_rqst').on('click',function(){
                console.log("declined");
                // console.log(response.invoice_no);
                window.location.href="/driver-ride-declined?inv_no="+response.invoice_no+"&amb_no="+response.amb_no;
                })
        })
        
        var response;
        navigator.geolocation.getCurrentPosition(success, error);

        function success(pos) {
            var lat = pos.coords.latitude;
            var lon = pos.coords.longitude;

            var map = L.map('map').setView([lat, lon], 18);

            googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            }).addTo(map);

            var patient_icon = L.icon({
                iconUrl: 'https://cdn-icons-png.flaticon.com/512/1673/1673221.png',
                iconSize: [40, 40]
            });

            var req = new XMLHttpRequest();
            req.open('GET', '/ptn-data-json', true);
            req.send();

            req.onreadystatechange = function () {
                if (req.readyState == 4 && req.status == 200) {
                    var obj = JSON.parse(req.responseText);
                    data = obj.ptn_data;
                    for (let i = 0; i < data.length; i++) {
                        var patient_marker = L.marker([data[i]['patient_booking_lat'], data[i]['patient_booking_lng']], {icon:patient_icon, id:data[i]['amb_no'], val:i}).addTo(map).on('click', mark_click); //Patient marker on map
                    }
                }
            };
            var taxiIcon = L.icon({
                iconUrl: 'https://cdn3.iconfinder.com/data/icons/map-and-navigation-25/50/49-512.png',
                iconSize: [60, 60]
            });

            var marker = L.marker([lat, lon], { icon: taxiIcon }).addTo(map);    //Ambulance marker on the map

            function mark_click(e) {
                // console.log(`${e.target.options.id} has been click`);
                // e._icon.classList.add("ptn-marker");
                console.log(e);
                lat_box.value = e.latlng['lat'];
                lng_box.value = e.latlng['lng'];
                var id = e.target.options.id;
                var ind_val = e.target.options.val;
                mark_id_box.value = id;
                var all_details = data[ind_val];
                ptn_box.innerHTML = all_details['amb_driver_name'] + " " + all_details['amb_address'] + " " + all_details['amb_contact'];
            }

            function getHref(obj)
            {
                console.log(obj.target.id);
            }
 

            navigator.geolocation.watchPosition(w_success, w_error);
            function w_success(pos) {
                marker.setLatLng([pos.coords.latitude, pos.coords.longitude]);
                map.setView([pos.coords.latitude, pos.coords.longitude]);
                coord_val = pos.coords.latitude;

                    var xhr = $.ajax({
                    url:"{{ route('showAvblRides') }}",
                    type:"GET",
                    data:{'lat':pos.coords.latitude,'lng':pos.coords.longitude,'amb_id':'{{session('amb_id')}}'}, //amb_id to be fetched from session variable later
                    success:function(data){
                        response = data.data[0];
                        var name = '<i class="fa-solid fa-user-large"></i>  ',addrs = ' <i class="fa-solid fa-house-chimney"></i>  ',
                        destination = '<i class="fa-solid fa-location-dot"></i>  ',
                        arrow_mark = '<i class="fa-solid fa-arrow-down fa-xl"></i>',
                        mobile = '<i class="fa-solid fa-phone"></i>  ',
                        dcl_btn = '';
                        
                        console.log(response);
                        name += response.patient_name;
                        addrs += response.patient_booking_address;
                        destination += response.dest_address;
                        mobile += response.patient_mobile;

                        accpt_link = "{{url('/')}}/driver-ride-accepted?ptn_lat="+response.patient_booking_lat+"&ptn_lng="+response.patient_booking_lng;

                    

                        $('#ptn_name').html(name);
                        $('#ptn_booking_addrs').html(addrs);
                        $('#ptn_dstn_addrs').html(destination);
                        $('#ptn_mobile').html(mobile);
                        $('#arrow').html(arrow_mark);
                        $("#acpt_ride_btn").html("<a href="+accpt_link+"><button class='btn btn-success'>Accept Ride</button></a>");
                        $("#dcln_ride_btn").html("<button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModal'>Decline Ride </button>");
                    }
                })
                }

            }
            function w_error(err) {
                //Error to display
            }

        function error(err) {
            if (err.code === 1) {
                alert("Please allow location access");
            }
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>