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
                <h2 class="me-2 text-light">Hi, Patient</h2>
            </div>
        </div>
        </nav>
        <div class="left-panel col-5 border vh-93 overflow-auto">
            <div class="patient-card-body">
                    <!-- Card header begins -->
                    <div class="card-body border mt-5 bg-primary">
                        <h5 class="card-title text-light" id="ptn_name"><div class="spinner-grow text-light" role="status"></div> Tracking Ambulance</h5>
                        <h6 class="card-subtitle mb-2 text-light" id="ptn_booking_addrs"></h6>
                        <h5 id="ptn_mobile" class="text-light"></h5>
                        <h5 id="acpt_ride_btn"></h5>
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

        const searchParams = new URLSearchParams(window.location.search);
        var ptn_lat = searchParams.get('ptn_lat');
        var ptn_lng = searchParams.get('ptn_lng');
        var amb_lat = searchParams.get('amb_lat');
        var amb_lng = searchParams.get('amb_lng');
        var amb_no = searchParams.get('amb_no');

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

    

        // var req = new XMLHttpRequest();
        // req.open('GET', '/ptn-data-json', true);
        // req.send();

        // req.onreadystatechange = function () {
        //     if (req.readyState == 4 && req.status == 200) {
        //         var obj = JSON.parse(req.responseText);
        //         data = obj.ptn_data;
        //         for (let i = 0; i < data.length; i++) {
        //             var patient_marker = L.marker([data[i]['patient_booking_lat'], data[i]['patient_booking_lng']], {icon:patient_icon}).addTo(map); //Patient marker on map
        //         }
        //     }
        // };

        $(document).ready(function(){
            var fetchAmbLoc = function(){
                $.ajax({
                url:'{{route('patientRideConfirmed')}}',
                type:'GET',
                data:{'amb_no':amb_no},
                success:function(data){
                    console.log(data.data[0]);
                    var pos = data.data[0];
                    ambulance_Marker.setLatLng([pos.amb_loc_lat,pos.amb_loc_lng]);
                    map.setView([pos.amb_loc_lat,pos.amb_loc_lng])
                }
            });
            }

            setInterval(fetchAmbLoc,2000);
        })

    </script>

</body>

</html>