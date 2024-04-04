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
    </style>

</head>

<body>

    <div class="container-fluid row">
            <nav class="navbar navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-light">Navbar</a>
            <div class="d-flex">
                <h2 class="me-2 text-light">Hi, {{$amb_record->amb_driver_name}}</h2>
            </div>
        </div>
        </nav>
        <div class="left-panel col-5 border vh-93 overflow-auto">
            <div class="patient-card-body">
                    <!-- Card header begins -->
                    <div class="card-body border mt-5">
                        <h5 class="card-title" id="ptn_name"></h5>
                        <h6 class="card-subtitle mb-2 text-muted" id="ptn_booking_addrs"></h6>
                        <h5 id="ptn_mobile"></h5>
                        <h5 id="acpt_ride_btn"></h5>
                    </div>
                    <!-- Card header ends -->
            </div>
        </div>
        <div id="map" style="width:80%; height: 93vh" class="col border"></div>
    </div>

    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>


    <script>
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

                    $.ajax({
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

                        link = "{{url('/')}}/driver-ride-accepted?ptn_lat="+response.patient_booking_lat+"&ptn_lng="+response.patient_booking_lng;

                        $('#ptn_name').html(name);
                        $('#ptn_booking_addrs').html(addrs);
                        $('#ptn_mobile').html(mobile);
                        $("#acpt_ride_btn").html("<a href="+link+"><button class='btn btn-success'>Accept Ride</button></a>");
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