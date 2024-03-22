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

    </style>

</head>

<body>

    <div class="container-fluid row">
        <div class="left-panel col-5 border vh-100 overflow-auto">
            <div class="patient-card-body">
                    <!-- Card header begins -->

                    <form class="row g-3 mt-5" method="post" action="{{url('/')}}/amb-ptn-home">
                        @csrf
                    <div class="col-md-3">
                        <img src="https://cdn-icons-png.flaticon.com/256/1834/1834837.png" alt="" width="100" >
                    </div>
                    <div class="col-md-9">
                        <h2>Ambulance Request</h2>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Patient name</label>
                        <input type="text" class="form-control" id="" name="ptn_name">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Patient age</label>
                        <input type="number" class="form-control" id="" name="ptn_age">
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Patient Contact</label>
                        <input type="tel" class="form-control" id="inputAddress" placeholder="" name="ptn_mob">
                    </div>
                    <div class="col-6">
                    <label for="" class="form-label">Patient gender</label>
                    <select class="form-select" aria-label="Default select example" name="ptn_gender">
                        <option selected>Choose gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Others</option>
                    </select>

                    </div>
                    <div class="col-12">
                    <label for="" class="form-label">Ambulance Type</label>
                    <select class="form-select" aria-label="Default select example" name="ptn_amb_type">
                        <option selected>Choose your ambulance</option>
                        <option value="normal">Normal</option>
                        <option value="Life-support">Life-support</option>
                    </select>
                    </div>

                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Full Address</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="ptn_address">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">City</label>
                        <input type="text" class="form-control" id="inputCity" name="ptn_city">
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">District</label>
                        <select id="inputState" class="form-select" name="ptn_district">
                        <option selected>Choose...</option>
                        <option value="24-Pgs(N)">North-24 Pgs</option>
                        <option value="24-Pgs(S)">South-24 Pgs</option>
                        <option value="Nadia">Nadia</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputZip" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="inputZip" name="ptn_zipcode">
                    </div>
                    <div class="col-md-6">
                        <label for="inputstate" class="form-label">State</label>
                        <input type="text" class="form-control" id="inputZip" name="ptn_state">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Request ride</button>
                    </div>

                    </form>
                    <!-- Card header ends -->
            </div>
        </div>
        <div id="map" style="width:80%; height: 100vh" class="col"></div>
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
                iconUrl: 'https://cdn-icons-png.freepik.com/512/9356/9356230.png',
                iconSize: [40, 40]
            });

            var req = new XMLHttpRequest();
            req.open('GET', '/amb-data-json', true);
            req.send();

            req.onreadystatechange = function () {
                if (req.readyState == 4 && req.status == 200) {
                    var obj = JSON.parse(req.responseText);
                    data = obj.amb_data;
                    for (let i = 0; i < data.length; i++) {
                        var patient_marker = L.marker([data[i]['amb_loc_lat'], data[i]['amb_loc_lng']], {icon:patient_icon, id:data[i]['amb_no'], val:i}).addTo(map).on('click', mark_click); //Patient marker on map
                    }
                }
            };
            var taxiIcon = L.icon({
                iconUrl: 'https://cdn-icons-png.freepik.com/512/9356/9356230.png',
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
                // map.setView([pos.coords.latitude, pos.coords.longitude]);
                my_lat_box.innerHTML = pos.coords.latitude;
                my_lng_box.innerHTML = pos.coords['longitude'];
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