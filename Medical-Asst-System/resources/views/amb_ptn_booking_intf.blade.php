<!DOCTYPE html>
<html>
<head>
    <title>Request Ambulance | 24x7 | Emergency</title>
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

                    <form class="row g-3 mt-5 mb-5" method="post" action="{{url('/')}}/amb-ptn-home">
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
                        <span class="text-danger">
                            @error('ptn_name')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Patient age</label>
                        <input type="number" class="form-control" id="" name="ptn_age">
                        <span class="text-danger">
                            @error('ptn_age')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Patient Contact</label>
                        <input type="tel" class="form-control" id="inputAddress" placeholder="" name="ptn_mob">
                        <span class="text-danger">
                            @error('ptn_mob')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-6">
                    <label for="" class="form-label">Patient gender</label>
                    <select class="form-select" aria-label="Default select example" name="ptn_gender">
                        <option selected>Choose gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Others</option>
                    </select>
                    <span class="text-danger">
                            @error('ptn_gender')
                            {{$message}}
                            @enderror
                    </span>
                    </div>
                    <div class="col-12">
                    <label for="" class="form-label">Ambulance Type</label>
                    <select class="form-select" aria-label="Default select example" name="ptn_amb_type" id="ptn_amb_type">
                        <option selected="true" disabled="disabled" value="">-- Choose Ambulance --</option>
                        <option value="normal">Normal</option>
                        <option value="Life-support">Life-support</option>
                    </select>
                    <span class="text-danger">
                            @error('ptn_amb_type')
                            {{$message}}
                            @enderror
                        </span>
                    </div>

                    <div class="col-md-12 border pb-3 pt-3">
                        <h4 class="mb-3 text-center">Pickup address details</h4>
                        <div class="col-12">
                        <label for="inputAddress2" class="form-label">Full Address</label>
                        <input type="text" class="form-control" id="full_address" placeholder="Apartment, studio, or floor" name="ptn_address">
                        <span class="text-danger">
                            @error('ptn_address')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="row">
                    <div class="col-6">
                        <label for="" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="ptn_latitude" readonly>
                        <span class="text-danger">
                            @error('ptn_address')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="ptn_longitude" readonly>
                        <span class="text-danger">
                            @error('ptn_address')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">City</label>
                        <datalist id="city" >
                            @foreach($cities as $city)
                                <option value="{{$city->city_ascii}}">{{$city->city_ascii}}</option>
                            @endforeach
                        </datalist>
                        <input  autoComplete="on" list="city" class="form-control" placeholder="Choose city" name="ptn_city" id="ptn_city"/>
                        <span class="text-danger">
                            @error('ptn_city')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">District</label>
                        <datalist id="district" >
                            @foreach($district as $dist)
                                <option value="{{$dist->District}}">{{$dist->District}}</option>
                            @endforeach
                        </datalist>
                        <input  autoComplete="on" list="district" class="form-control" placeholder="Choose district" name="ptn_district" id="ptn_district"/>
                        <span class="text-danger">
                            @error('ptn_district')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    </div>
                    
                    <div class="row">
                    <div class="col-md-6">
                        <label for="inputZip" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="ptn_zip" name="ptn_zipcode">
                        <span class="text-danger">
                            @error('ptn_zipcode')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="inputstate" class="form-label">State</label>
                        <datalist id="state" >
                            @foreach($states as $state)
                                <option value="{{$state->States}}">{{$state->States}}</option>
                            @endforeach
                        </datalist>
                        <input  autoComplete="on" list="state" class="form-control" placeholder="Choose state" name="ptn_state" id="ptn_state"/>
                        <span class="text-danger">
                            @error('ptn_state')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    </div>
                    </div>
                    <div class="col-md-12 border pb-3 pt-3">
                    <h4 class="text-center">Destination address details</h4>
                        <div class="row">
                        <div class="col-md-12">
                        <label for="hospitalInput" class="form-label">Hospital address</label><span class="text-danger">*</span>
                            <datalist id="hospital">
                                @foreach($hospitals as $hos)
                                    <option value="{{$hos->hos_name}}-{{$hos->hos_id}}">{{$hos->hos_address}}</option>
                                @endforeach
                            </datalist>
                            <input  autoComplete="on" list="hospital" class="form-control" placeholder="Choose hospital" name="hos_details" id="hos_details"/> 
                            <span class="text-danger">
                                @error('hos_details')
                                {{$message}}
                            @enderror
                            </span>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" readonly id="hos_id_value" name="hos_id" hidden>
                        </div>
                        </div>
                        
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        var data;
        const address_box = document.getElementById('full_address');
        const lat_box = document.getElementById('latitude');
        const lng_box = document.getElementById('longitude');
        const hosp_dd = document.getElementById('hos_details');
        const hosp_array = document.getElementById('hospital');
        const hosp_id = document.getElementById('hos_id_value');

        navigator.geolocation.getCurrentPosition(success, error);

        let urlParams = new URLSearchParams(document.location.search);
        let booking_address = urlParams.get('fmt_ads');
        let booking_latitude = urlParams.get('lat');
        let booking_longitude = urlParams.get('lng');
        let amb_type_val = urlParams.get('amb_type');
        let amb_city_val = urlParams.get('city');
        let amb_state_val = urlParams.get('state');
        let amb_dist_val = urlParams.get('dist');
        let amb_zip_val = urlParams.get('zip');

        console.log(address_box);
        address_box.value = booking_address;
        lat_box.value = booking_latitude;
        lng_box.value = booking_longitude;

        //Selecting the value set by user in prevoius page, automatiically
        document.getElementById('ptn_amb_type').value=amb_type_val;
        document.getElementById('ptn_city').value = amb_city_val;
        document.getElementById('ptn_state').value = amb_state_val;
        document.getElementById('ptn_district').value = amb_dist_val;
        document.getElementById('ptn_zip').value = amb_zip_val;
        //-----------------------------------------------------------------

        //On selecting any hospital, hos_id is being extracted from the string and displayed on input box in readonly mode

        hosp_dd.addEventListener("change",()=>{
            st_ind = hosp_dd.value.search("HSP");
            hosp_id.value = hosp_dd.value.slice(st_ind);
        })
        //------------------------------------------------------------------

        //This function is called by navigator js object, when location is successfully fetched

        function success(pos) {
            var lat = pos.coords.latitude;
            var lon = pos.coords.longitude;

            var map = L.map('map').setView([booking_latitude, booking_longitude], 18);

            googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
            }).addTo(map);

            var taxi_icon = L.icon({
                iconUrl: 'https://multidestinosexpress.co/wp-content/uploads/2022/08/22.png',
                iconSize: [50, 50]
            });

            var req = new XMLHttpRequest();
            req.open('GET', '/amb-data-json', true);
            req.send();

            req.onreadystatechange = function () {
                if (req.readyState == 4 && req.status == 200) {
                    var obj = JSON.parse(req.responseText);
                    data = obj.amb_data;
                    for (let i = 0; i < data.length; i++) {
                        var patient_marker = L.marker([data[i]['amb_loc_lat'], data[i]['amb_loc_lng']], {icon:taxi_icon, id:data[i]['amb_no'], val:i}).addTo(map).on('click', mark_click); //Patient marker on map
                    }
                }
            };
            var patientIcon = L.icon({
                iconUrl: 'https://cdn3.iconfinder.com/data/icons/maps-and-navigation-7/65/68-512.png',
                iconSize: [50, 50]
            });

            var marker = L.marker([booking_latitude,booking_longitude], { icon: patientIcon }).addTo(map);    //Ambulance marker on the map

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
        }

        function error(err) {
            if (err.code === 1) {
                alert("Please allow location access");
            }
        }
        //------------------------------------------------------------------
    </script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>