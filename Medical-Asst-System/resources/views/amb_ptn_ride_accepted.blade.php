<!DOCTYPE html>
<html>
<head>
    <title>Geolocation</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    
    <style>
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
        .left-panel
        {
            background: rgb(234,215,255);
            background: linear-gradient(180deg, rgba(234,215,255,1) 0%, rgba(190,255,242,1) 100%);
        }
        #navbar
        {
            background: rgb(253,250,255);
            background: linear-gradient(180deg, rgba(253,250,255,1) 0%, rgba(247,255,253,1) 100%);
        }
        .logo
        {
            color: rgb(68, 68, 68);
            text-decoration: none;
            font-size: 1.7rem;
            margin-left: 7px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<nav class="navbar navbar-light container-fluid bg-light shadow-sm p-1  bg-body rounded">
            
            <a href="#" class="logo"><i class="fa-solid fa-heart-pulse" style="color: #00a896;"></i>Medilities</a>

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
                    <li><h4 class="dropdown-item">{{session('user_name')}}</h4></li>
                </ul>
                </div>
            </h2>
            </div>
        </div>
        </nav>

        <div class="container-fluid row">
            <div class="left-panel col-5 border vh-93 overflow-auto">
                        <div class="card-body border mt-5 bg-light d-flex" id="amb_tracking_banner">
                            <h3 class="card-title" id="ptn_name"><div class="spinner-grow text-danger" role="status"></div class="flex-column justify-content-center align-items-center">  Tracking Ambulance</h3>
                        </div>

                <div class="patient-card-body">
                        <!-- Card header begins -->
                        <h5 class="alert alert-success mt-2" id="amb_status"></h5>

                        <div class="card-body mt-3 bg-light pt-3 pb-3 shadow-lg p-3 mb-5 bg-body rounded" style="width: 34.2rem;">
                        <div class="card-body">
                            <h5 class="card-title">Ambulance details</h5>
                            <h6 class="card-subtitle mb-2" id="amb_no">{{$ptn_rqst_data[0]['amb_no']}}</h6>
                            <p class="card-text" id="amb_name">{{$amb_data[0]['amb_name']}}</p>
                            <h2 id="otp_no">OTP - {{$ptn_rqst_data[0]['otp']}}</h2>
                            <p class="form-text">Please share the OTP with your assigned driver, so that he can start the ride. Once the ride ends, please share your feedback with us</p>
                        </div>
                        </div>
                        <!-- Card header ends -->
                </div>
                <div class="row card-body mt-3 bg-light pt-3 pb-3 shadow-lg p-3 mb-5 bg-body rounded" id="feedback_section">
                <div class="col-md-7 text-center">
                        <h5>Your feedback is valuable to us</h5>
                    </div>
                    <div class="col-md-5 text-center">
                        <a href="/user_rating"><button class="btn btn-primary" id="feedback">Share Feedback</button></a>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div id="map" style="width: 57vw; height: 93vh" class="col border"></div>
            </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>

        const ride_status_view =document.getElementById('amb_status');

        const searchParams = new URLSearchParams(window.location.search);
        var ptn_lat = searchParams.get('ptn_lat');
        var ptn_lng = searchParams.get('ptn_lng');
        var amb_lat = searchParams.get('amb_lat');
        var amb_lng = searchParams.get('amb_lng');
        var amb_no = searchParams.get('amb_no');
        var inv_no = searchParams.get('inv_no');

        var map = L.map('map').setView([ptn_lat, ptn_lng], 20);

        var taxiIcon = L.icon({
            iconUrl: 'https://cdn3.iconfinder.com/data/icons/map-and-navigation-25/50/49-512.png',
            iconSize: [50, 50]
        });

        var patient_icon = L.icon({
            iconUrl: 'https://cdn-icons-png.flaticon.com/512/1673/1673221.png',
            iconSize: [40, 40]
        });

        var ambulance_Marker = L.marker([amb_lat, amb_lng], { icon: taxiIcon }).addTo(map);    //Ambulance marker on the map

        var patient_Marker = L.marker([ptn_lat,ptn_lng],{icon:patient_icon}).addTo(map);

        googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

    
        //ajax for fetching the realtime location of ambulance for every 2 seconds

        $(document).ready(function(){
            $('#feedback_section').hide();
            var distance = 0;
                L.Routing.control({
                    waypoints: [
                        L.latLng(ptn_lat,ptn_lng),
                        L.latLng(amb_lat,amb_lng)
                    ]
                }).on('routesfound', function (e) {
                    var routes = e.routes;
                    routesFound = true;
                    console.log(routes[0]['summary']);
                    var estm_time = routes[0]['summary']['totalTime'];
                    var time_roundup;
                    distance = routes[0]['summary']['totalDistance']
                    if(estm_time>=3600)
                    {
                      time_roundup = estm_time/3600;
                      time_roundup = time_roundup.toFixed(1);
                      time_roundup = time_roundup + " hrs";
                    }
                    else
                    {
                      time_roundup = estm_time/60;
                      time_roundup = time_roundup.toFixed(1);
                      time_roundup = time_roundup + " mins";
                    }
                    ride_status_view.innerText="Driver has started his ride and will reach your pickup location within "+time_roundup;
                }).addTo(map);

            var fetchAmbLoc = function(){
                $.ajax({
                url:'{{route('patientRideConfirmed')}}',
                type:'GET',
                data:{'amb_no':amb_no,'inv_no':inv_no},
                success:function(data)
                {
                    if(data.data.amb_status[0].ride_status=='011')
                    {
                        ride_status_view.innerText="Driver has successfully picked up";
                    }
                    else if(data.data.amb_status[0].ride_status=='111')
                    {
                        ride_status_view.innerText="Driver has successfully reached it's destination";
                        $('#feedback_section').show();
                    }
                    // console.log(data.data[0]);
                    console.log(data.data.amb_status[0].ride_status)
                    var pos = data.data.amb_coordinates[0];
                    // console.log(pos);
                    ambulance_Marker.setLatLng([pos.amb_loc_lat,pos.amb_loc_lng]);
                    map.setView([pos.amb_loc_lat,pos.amb_loc_lng]);
                }
            });
            }

            setInterval(fetchAmbLoc,2000);
        })

    </script>

</body>

</html>