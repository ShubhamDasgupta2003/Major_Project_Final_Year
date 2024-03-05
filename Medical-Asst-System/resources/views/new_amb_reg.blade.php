<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Ambulance Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-light bg-gradient">
    <div class="container-md bg-light bg-gradient mb-3 mt-3 p-5 border rounded justify-content-center shadow p-3 mb-5 bg-body rounded">
        <form action="{{url('/')}}/amb-reg" method="post">
            @csrf
            <h2 class="text-primary mb-5 bg-primary p-3 shadow-sm p-3 mb-5 bg-body rounded">New Ambulance Service Registration</h2>
            <div class="mb-3">
                <label for="amb_name_reg" class="form-label">Ambulance service name (max 50.characters)</label>
                <input type="text" name="amb_name_reg" id="" class="form-control">
                <span class="text-danger">
                    @error('amb_name_reg')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="amb_no_reg" class="form-label">Ambulance van no.<sub>  (Govt. registered number)</sub></label>
                <input type="text" name="amb_no_reg" id="" class="form-control">
                <span class="text-danger">
                    @error('amb_no_reg')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="amb_type_reg" class="form-label">Ambulance Type</label>
                <select name="amb_type_reg" id="" class="form-select">
                    <option value="Normal">Normal (Only Stretcher)</option>
                    <option value="Life-Support">Life-Support (Ventilator,Medical Technician,etc)</option>
                </select>
                <span class="text-danger">
                    @error('amb_type_reg')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="amb_rate_reg" class="form-label">Ambulance rate (Rs/Km)</label>
                <input type="text" name="amb_rate_reg" id="" class="form-control">
                <span class="text-danger">
                    @error('amb_rate_reg')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="amb_drv_name_reg" class="form-label">Ambulance Driver Name</label>
                <input type="text" name="amb_drv_name_reg" id="" class="form-control">
                <span class="text-danger">
                    @error('amb_drv_name_reg')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="amb_drv_contact_reg" class="form-label">Driver Mobile <sub>(without including +91)</sub></label>
                <input type="tel" name="amb_drv_contact_reg" id="" class="form-control">
                <span class="text-danger">
                    @error('amb_drv_contact_reg')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="amb_drv_email_reg" class="form-label">Driver Email</label>
                <input type="email" name="amb_drv_email_reg" id="" class="form-control">
                <span class="text-danger">
                    @error('amb_drv_email_reg')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="amb_addr_reg" class="form-label">Ambulance Address</label>
                <input type="text" name="amb_addr_reg" id="amb_address_view" class="form-control">
                <span class="text-danger">
                    @error('amb_addr_reg')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <p class="alert alert-warning">If current latitude and longitude shown is not correct it is recommended to use GPS device</p>
            <div class="mb-3 row">
                <div class="col">
                    <label for="amb_lat_reg" class="form-label">Current Latitude</label>
                    <input type="number" name="amb_lat_reg" id="amb_lat_view" class="form-control" readonly>
                </div>
                <div class="col">
                    <label for="amb_lon_reg" class="form-label">Current Longitude</label>
                    <input type="number" name="amb_lon_reg" id="amb_lon_view" class="form-control" readonly>
                </div>
            </div>
            <div class="mb-3">
                <label for="amb_state_reg" class="form-label">Ambulance State</label>
                <input type="text" name="amb_state_reg" id="" class="form-control">
                <span class="text-danger">
                    @error('amb_state_reg')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="amb_district_reg" class="form-label">Ambulance District</label>
                <input type="text" name="amb_district_reg" id="" class="form-control">
                <span class="text-danger">
                    @error('amb_district_reg')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="amb_town_reg" class="form-label">Ambulance Town/Village</label>
                <input type="text" name="amb_town_reg" id="" class="form-control">
                <span class="text-danger">
                    @error('amb_town_reg')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="amb_pincode_reg" class="form-label">Area Pincode</label>
                <input type="text" name="amb_pincode_reg" id="" class="form-control">
                <span class="text-danger">
                    @error('amb_pincode_reg')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="amb_password_reg" class="form-label">Password</label>
                <input type="password" name="amb_password_reg" id="" class="form-control">
                <span class="text-danger">
                    @error('amb_password_reg')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="amb_password_reg" class="form-label">Confirm Password</label>
                <input type="password" name="amb_password_reg" id="" class="form-control">
                <span class="text-danger">
                    @error('amb_password_reg')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <button class="btn btn-success" type="submit">Register</button>
        </form>
    </div>
    <!-- <script src="{{ asset('js/amb_admin_loc.js') }}"></script> -->
</body>
</html>