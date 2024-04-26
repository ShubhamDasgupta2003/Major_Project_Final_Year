<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    @include('common_css')
    <link rel="stylesheet" href="css/BloodBank/BookingForm.css">
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
                    <h1 class='descp' id='title'>{{$bank->name}}</h1>
                    <h3><p class='descp' id='card-address'><i class='fa-solid fa-location-dot'></i>{{$bank->state}},{{$bank->city}}</p></h3>
                    <h3><p class='descp bg' id='card-type'>O+</p></h3>
                    <h2><p class='descp' id='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i>&nbsp&nbsp386.2 km</p></h2>
                    <h2 class='descp' id='card-fare'>&#8377 {{$bloodPrice}}/-</h2>
                    </div>                <div class="patient_info_cont">
    
                    <form method="post" action="">
                        <label for="">Patient's Full Name<sup class="mandatory">*</sup></label>
                        <input type="text" name="pat_name" id="" placeholder="Enter Patient's full name"  required>

                        <label for="">Age<sup class="mandatory">*</sup></label>
                        <input type="number" name="pat_age" id="" placeholder="Patient's age" required>

                        <label for="">Mobile No.<sup class="mandatory">*</sup></label>
                        <input type="tel" name="cont_num" id="" placeholder="Contact number" required>

                        <label for="">Gender<sup class="mandatory">*</sup></label>
                        <div class="row">
                            <input type="radio" name="gender" value="male"> Male
                            <input type="radio" name="gender" value="female"> Female
                        </div>
                        <button class="btn" name="book_blood">Confirm Order</button>
                    </form>
                    <a href="{{route('showBhome')}}"><button class="btn-danger" name="cancel_ride">Cancel Order</button></a>
                </div>
            </div>     
        </div>
    </div>
</body>
</html>
