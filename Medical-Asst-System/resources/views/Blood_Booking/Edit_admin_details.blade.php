<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/minor%20Project%205th_Sem//Emergency_Medical_Support_System/HomePage/style.css">
</head>
<body>
    
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card shadow">
              
                <div class="card-header">
                    <div class="row "> <!--justify-content-center -->
                        <div class="col-md-8 "><h2>Updates Blood Bank's Details</h2></div>   <!-- text-center -->
                        <div class="col-md-2"><a href="/BBadmin" class="btn btn-info">Dashboard</a></div>
                        <div class="col-md-2"><a href="{{ route('Adminlogout') }}" class="btn btn-danger">Logout</a></div>
                    </div>
                </div>

                <div class="card-body">
                    <form action=" {{route('update_bldBanks_details')}} " method="post">
                        @csrf <!-- Add this line to include CSRF token -->
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $data->name }}" placeholder="Enter your Blood bank name" class="form-control">

                        <label for="">Latitude</label>
                        <input type="text" name="lat" value="{{ $data->latitude }}" placeholder="Enter your Latitude" class="form-control">

                        <label for="">Longitude</label>
                        <input type="text" name="lon" value="{{ $data->longitude }}" placeholder="Enter your Longitude" class="form-control">
                    
                        <label for="">State</label>
                        <input type="text" name="state" readonly value="{{ $data->state }}" placeholder="Enter your state" class="form-control">

                        <label for="">City</label>
                        <input type="text" name="city" value="{{ $data->city }}" placeholder="Enter your city" class="form-control">

                        <label for="">Phone</label>
                        <input type="number" name="phone" value="{{ $data->phone }}" placeholder="Enter your Longitude" class="form-control">

                        <label for="">Pin code</label>
                        <input type="text" name="pin" value="{{ $data->pin }}" placeholder="Enter your Pincode" class="form-control">
                    
                        <label for="">Dist</label>
                        <select name="dist" class="form-control">
                            <option value="" selected disabled>Select District</option>
                            <!-- Populate options based on your data -->
                            @foreach($districts as $district)
                                 @if ($data->dist == $district)
                                    <option value="{{ $district }}" selected>{{ $district }}</option>
                                 @else
                                    <option value="{{ $district }}">{{ $district }}</option>
                                 @endif
                            @endforeach
                        </select>

                        <!-- <label for="">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control"> -->

                        <input type="submit" value="Submit" name="submit" class="btn btn-success submit-btn form-control">
                    </form>
                </div>
             
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
