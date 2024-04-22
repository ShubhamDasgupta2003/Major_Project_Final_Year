<!DOCTYPE html>
<html>
<head>
    <title>Geolocation</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

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
        <div id="map" style="width:100%; height:100vh" class="col "></div>
    
        <div class="card text-center position-absolute bottom-0 start-50 translate-middle-x shadow-lg p-3 rounded border-top-3" id="details_card" style="height:auto">
  <div class="card-header">
    Ride Details
  </div>
  <div class="card-body">
    <h5 class="card-title">Going to {{$dest_details[0]->dest_address}}</h5>
    <h3 id="expt_time"></h3>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Finish Ride
    </button>
  </div>
  <div class="card-footer text-muted">
   
  </div>
</div>
    </div>

    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>

        const pickUpLocationStartBtn = document.getElementById('pickup_StartRide');
        const detailsTab = document.getElementById('details_card');
        const time_rqd = document.getElementById('expt_time');
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

            var hospital_icon = L.icon({
                iconUrl: 'https://png.pngtree.com/png-vector/20221130/ourmid/pngtree-hospital-location-pin-icon-in-red-color-png-image_6485371.png',
                iconSize: [45, 45]
            });

            var taxiIcon = L.icon({
                iconUrl: 'https://cdn3.iconfinder.com/data/icons/map-and-navigation-25/50/49-512.png',
                iconSize: [50, 50]
            });

            var marker = L.marker([lat, lon], { icon: taxiIcon }).addTo(map);    //Ambulance marker on the map

            var hospital_marker = L.marker(['{{$dest_details[0]->dest_latitude}}','{{$dest_details[0]->dest_longitude}}'], { icon: hospital_icon }).addTo(map); //Patient marker on the map



            $(document).ready(() => {
                L.Routing.control({
                    waypoints: [
                        L.latLng(lat, lon),
                        L.latLng('{{$dest_details[0]->dest_latitude}}','{{$dest_details[0]->dest_longitude}}')
                    ]
                }).on('routesfound', function (e) {
                    var routes = e.routes;
                    routesFound = true;
                    console.log(routes[0]['summary']);
                    var estm_time = routes[0]['summary']['totalTime'];
                    var time_roundup;
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
                    time_rqd.innerText = "Expected time: "+time_roundup;
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