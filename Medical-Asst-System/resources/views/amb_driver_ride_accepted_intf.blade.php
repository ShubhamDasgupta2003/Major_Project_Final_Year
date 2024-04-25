<!DOCTYPE html>
<html>
<head>
    <title>Geolocation</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        #details_card
        {
          z-index: 200;
          background-color:rgba(255, 255, 255, 0.38);
        }
        #map
        {
          z-index: 10;
        }
    </style>

</head>

<body>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Verify Patient</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('driverRideAccepted')}}" method="post">
        @csrf
          <div class="input-group mb-3">
          <input type="text" id="otp_val" class="form-control" placeholder="Enter OTP here" aria-label="OTP" aria-describedby="button-addon2" name="otp">
          <button class="btn btn-outline-success" type="submit" id="verify_otp">Verify</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <div class="container-fluid justify-content-center">
        @if($alert != "")
    
          <h5 class="alert alert-danger alert-dismissible fade show mb-0 mt-1">{{$alert}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </h5>
      
        @endif
        <div id="map" style="width:100%; height:100vh" class="col "></div>
    
        <div class="card text-center position-absolute bottom-0 start-50 translate-middle-x shadow-lg p-3 rounded border-top-3" id="details_card" style="height:auto">
  <div class="card-header text-primary">
    Ride Details
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$ride_info[0]->patient_name}}</h5>
    <h3><a href="tel: {{$ride_info[0]->patient_mobile}}"><button class="btn btn-success"><i class="fa-solid fa-phone-volume" style="color: #ffffff;"></i> Call Patient</button></a></h3>
    <p class="card-text">{{$ride_info[0]->patient_booking_address}}</p>
    <a href="#" id="pickup_StartRide" class="btn btn-primary">Go to pickup location</a>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Start Ride
    </button>
  </div>
  <div class="card-footer text-muted">
    <h3 id="dist_travelling"></h3>
  </div>
</div>
    </div>

    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>

        const pickUpLocationStartBtn = document.getElementById('pickup_StartRide');
        const dist_tab = document.getElementById('dist_travelling');
        const detailsTab = document.getElementById('details_card');
        const mapLayer = document.getElementById('map');

        var data;
        var routesFound = false;

        detailsTab.addEventListener('click',()=>{
          detailsTab.classList.add("bg-light");
        });
        mapLayer.addEventListener('click',()=>{
          detailsTab.classList.remove("bg-light");
        });

        navigator.geolocation.getCurrentPosition(success, error);

        function success(pos) {
            var lat = pos.coords.latitude;
            var lon = pos.coords.longitude;
            const searchParams = new URLSearchParams(window.location.search);
            var ptn_lat = searchParams.get('ptn_lat');
            var ptn_lng = searchParams.get('ptn_lng');

            var map = L.map('map').setView([lat, lon], 18);

            googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            }).addTo(map);

            var patient_icon = L.icon({
                iconUrl: 'https://cdn-icons-png.flaticon.com/512/1673/1673221.png',
                iconSize: [40, 40]
            });

            var taxiIcon = L.icon({
                iconUrl: 'https://cdn3.iconfinder.com/data/icons/map-and-navigation-25/50/49-512.png',
                iconSize: [50, 50]
            });

            var marker = L.marker([lat, lon], { icon: taxiIcon }).addTo(map);    //Ambulance marker on the map

            var ptn_marker = L.marker([ptn_lat, ptn_lng], { icon: patient_icon }).addTo(map); //Patient marker on the map



            pickUpLocationStartBtn.addEventListener('click',() => {
                L.Routing.control({
                    waypoints: [
                        L.latLng(lat, lon),
                        L.latLng(ptn_lat, ptn_lng)
                    ]
                }).on('routesfound', function (e) {
                    var routes = e.routes;
                    routesFound = true;
                    console.log(routes[0]['summary']);
                    let dist = (routes[0]['summary']['totalDistance'])/1000;
                    let dist_roundup = dist.toFixed(2);
                    dist_tab.innerText = dist_roundup+" km";
                    if(routesFound)
                    {
                      pickUpLocationStartBtn.classList.add("disabled");
                      console.log("Disabled")
                    }
                    //Edited code statrs her

                }).addTo(map);
            });

    
            navigator.geolocation.watchPosition(w_success, w_error);
            function w_success(pos) {
                marker.setLatLng([pos.coords.latitude, pos.coords.longitude]);
                map.setView([pos.coords.latitude, pos.coords.longitude]);
                var xhr = $.ajax({
                    url:"{{ route('driverRideAccepted') }}",
                    type:"GET",
                    data:{'lat':pos.coords.latitude,'lng':pos.coords.longitude,'amb_id':'{{session('amb_id')}}'}, //amb_id to be fetched from session variable later
                    success:function(data){
                         console.log(data);
                    }
                })
            }
            function w_error(err) {
                //Error to display
            }
        }

        function error(err) {
            if (err.code === 1) {
                alert("Please allow location access");
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>