<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    {{-- Include Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- @include('common_css') --}}
    {{-- <link rel="stylesheet" href="css/BloodBank/BookingForm.css"> --}}
    {{-- <link rel="stylesheet" href="css/BloodBank/abc.css"> --}}

</head>
<body>
    <div class="container">
        <div class="card">
            <!-- <img src="https://maishacare.com/wp-content/uploads/2022/06/ambulance-service-van-emergency-medical-vehicle-vector-illustration-white-background-ambulance-service-van-emergency-medical-127018462.jpg" alt=""> -->
            @php
                $bloodPrice = session('blood_price');
            @endphp
            <div class="column">
                <div class='amb_info_cont'>
                    <h1 class='descp' id='title'>{{ request()->query('name') }}</h1>
                    <h3><p class='descp' id='card-address'><i class='fa-solid fa-location-dot'></i>{{ request()->query('state') }},{{ request()->query('city') }}</p></h3>
                    <h3><p class='descp bg' id='card-type'>{{ request()->query('blood_gr')}}</p></h3>
                    <h2><p class='descp' id='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i>&nbsp&nbsp386.2 km</p></h2>
                    <h2 class='descp' id='card-fare'>&#8377 {{$bloodPrice}}/-</h2>
                </div>                
              

                 <div class="patient_info_cont">
    
                    <form method="post" enctype="multipart/form-data" action="{{url('/confirm_booking')}}">
                        @csrf

                        <div class="mb-3">
                            <label for="pat_name" class="form-label">Patient's Full Name<sup class="mandatory">*</sup></label>
                            <input type="text" class="form-control" id="pat_name" name="pat_name" placeholder="Enter Patient's full name" required>
                        </div>

                        <div class="mb-3">
                            <label for="pat_age" class="form-label">Age<sup class="mandatory">*</sup></label>
                            <input type="number" class="form-control" id="pat_age" name="pat_age" placeholder="Patient's age" required>
                        </div>

                        <div class="mb-3">
                            <label for="cont_num" class="form-label">Mobile No.<sup class="mandatory">*</sup></label>
                            <input type="tel" class="form-control" id="cont_num" name="cont_num" placeholder="Contact number" required>
                        </div>

                        <div class="mb-3">
                            <label for="prex" class="form-label">Prescription<sup class="mandatory">*</sup></label>
                            <input type="file" class="form-control prex" id="prex" name="prex" placeholder="Upload prescription" required>
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender<sup class="mandatory">*</sup></label>
                            <div class="row">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Confirm Order</button>
                    </form>
                    <a href="{{route('showBhome')}}" class="btn btn-danger">Cancel Order</a>
                </div>
            </div>     
        </div>
    </div>

    {{-- Include Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

</html>
