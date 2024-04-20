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
        <form action="" method="post">
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Enter reason here" aria-label="OTP" aria-describedby="button-addon2">
        <button class="btn btn-outline-success" type="button" id="dcln_rqst">Submit</button>
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

    <div class="container-fluid row">
            <nav class="navbar navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-light">Navbar</a>
            <div class="d-flex">
                <h2 class="me-2 text-light"> 
                <!-- Example single danger button -->
                <div class="btn-group">
                <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    {{$amb_record->amb_driver_name}}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> My Profile</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-money-check-dollar"></i> My Earnings</a></li>
                    <li><a class="dropdown-item"><button class="btn btn-danger"><i class="fa-solid fa-moon"></i> Take break</button></a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-power-off"></i> Logout</a></li>
                </ul>
                </div>
            </h2>
            </div>
        </div>
        </nav>
        <div class="left-panel col-5 border vh-93 overflow-auto">
            <div class="patient-card-body">
                    <!-- Card header begins -->
                    <div class="card-body border mt-5 bg-primary">
                        <h5 class="card-title text-light" id="ptn_name"><div class="spinner-grow text-light" role="status"></div> Getting rides...</h5>
                        <h6 class="card-subtitle mb-2 text-light" id="ptn_booking_addrs"></h6>
                        <h5 id="ptn_mobile" class="text-light"></h5>
                        <h5 id="acpt_ride_btn"></h5>
                        <h5 id="dcln_ride_btn"></h5>
                    </div>
                    <!-- Card header ends -->
            </div>
        </div>
        <div id="map" style="width:80%; height: 93vh" class="col border"></div>
    </div>

    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
             $(document).ready(function(){
            $('#dcln_rqst').on('click',function(){
                    $.ajax({
                        url:'{{route('showAvblRides')}}',
                        type:'GET',
                        data:{'amb_no':1423},
                        success:function(data){
                            console.log(data);
                        }
                    })
                })
        })
        
        var data;
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
                iconSize: [50, 50]
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
                        var name = '<i class="fa-solid fa-user-large"></i>  ',addrs = '<i class="fa-solid fa-house-chimney"></i>  ',
                        mobile = '<i class="fa-solid fa-phone"></i>  ',
                        dcl_btn = '';
                        
                        console.log(response);
                        name += response.patient_name;
                        addrs += response.patient_booking_address;
                        mobile += response.patient_mobile;

                        accpt_link = "{{url('/')}}/driver-ride-accepted?ptn_lat="+response.patient_booking_lat+"&ptn_lng="+response.patient_booking_lng;

                    

                        $('#ptn_name').html(name);
                        $('#ptn_booking_addrs').html(addrs);
                        $('#ptn_mobile').html(mobile);
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