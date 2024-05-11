<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    {{-- Include Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 650px; /* Adjust the maximum width of the form */
            margin: auto; /* Center the form horizontally */
        }
        .mandatory{
            color:red;
            font-size: 1em;

        }
        .disable{
            display: none;
        }
        .bg{
            color:red;
        }
        #title{
            color:#00b37d;
        }
        .custom-bg {
    background-color: #f0f0f0; /* Choose your desired background color */
    padding: 20px; /* Optional: Adjust padding as needed */
    }

    </style>

</head>
<body>
    <div class="container">
        <div class="card custom-bg">
            <!-- <img src="https://maishacare.com/wp-content/uploads/2022/06/ambulance-service-van-emergency-medical-vehicle-vector-illustration-white-background-ambulance-service-van-emergency-medical-127018462.jpg" alt=""> -->
            @php
                $bloodPrice = session('blood_price');
            @endphp
            <div class="column">
                <div class='amb_info_cont'>
                    <h3 class='descp' id='title'>{{ request()->query('name') }}</h3>
                    <h4><p class='descp' id='card-address'><i class='fa-solid fa-location-dot'></i>{{ request()->query('state') }},{{ request()->query('city') }}</p></h4>
                    <h4 class='descp ' id='card-type'>Blood Group: <span class="bg">{{ request()->query('blood_gr')}}</span> </h4>
                    <h5><p class='descp' id='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i>&nbsp&nbsp386.2 km</p></h5>
                    <h4 class='descp' id='card-fare'>&#8377 {{$bloodPrice}}/-</h4>
                </div>                
    
                <div class="patient_info_cont">
    
                    <form method="post" enctype="multipart/form-data" action="{{url('/confirm_booking')}}">
                        @csrf
                    
                        <div class="mb-3">
                            <label for="pat_name" class="form-label">Patient's Full Name<sup class="mandatory">*</sup></label>
                            <input type="text" class="form-control" id="pat_name" name="pat_name" placeholder="Enter Patient's full name" value="{{ old('pat_name') }}">
                            <span class="text-danger">@error('pat_name') {{ $message }} @enderror</span>
                        </div>
                    
                        <div class="mb-3">
                            <label for="pat_age" class="form-label">Age<sup class="mandatory">*</sup></label>
                            <input type="number" class="form-control" id="pat_age" name="pat_age" placeholder="Patient's age" value="{{ old('pat_age') }}">
                            <span class="text-danger">@error('pat_age') {{ $message }} @enderror</span>
                        </div>
                    
                        <div class="mb-3">
                            <label for="cont_num" class="form-label">Mobile No.<sup class="mandatory">*</sup></label>
                            <input type="tel" class="form-control" id="cont_num" name="cont_num" placeholder="Contact number" value="{{ old('cont_num') }}">
                            <span class="text-danger">@error('cont_num') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                             <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity<sup class="mandatory">*</sup></label>
                            <div class="input-group">
                                <button class="btn btn-outline-secondary" type="button" id="decrementBtn">-</button>
                                <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" max="10">
                                <button class="btn btn-outline-secondary" type="button" id="incrementBtn">+</button>
                            </div>
                            <span class="text-danger">@error('quantity') {{ $message }} @enderror</span>
                        </div>
                    
                        <div class="mb-3">
                            <label for="prex" class="form-label">Prescription<sup class="mandatory">*</sup></label>
                            <input type="file" class="form-control prex" id="prex" name="prex" placeholder="Upload prescription">
                            <span class="text-danger">@error('prex') {{ $message }} @enderror</span>
                        </div>
                        </div>
                       
                        <div class="mb-3 disable">
                            <label for="" class="form-label">Bank_id<sup class="mandatory">*</sup></label>
                            <input type="text" class="form-control"  name="bank_id"  value="{{ request()->query('id')}}">
                           
                        </div>
                        <div class="mb-3 disable">
                            <label for="" class="form-label">Bank_id<sup class="mandatory">*</sup></label>
                            <input type="text" class="form-control"  name="blood_gr"  value="{{ request()->query('blood_gr')}}">
                           
                        </div>
                    
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender<sup class="mandatory">*</sup></label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" @if(old('gender') == 'male') checked @endif>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" @if(old('gender') == 'female') checked @endif>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                            <span class="text-danger">@error('gender') {{ $message }} @enderror</span>
                        </div>
                    
                        <div class="action d-flex justify-content-between">
                            <a href="{{route('showBhome')}}" class="btn btn-danger">Cancel Order</a>
                            {{-- <a href="{{route('payment')}}" class="btn btn-primary">Confirm Order</a> --}}
                            <button type="submit" class="btn btn-primary">Confirm Order</button>
                        </div>
                    </form>
                    
                </div>
            </div>     
        </div>
    </div>
    
    {{-- Include Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>


<script>
    document.getElementById('incrementBtn').addEventListener('click', function() {
        var input = document.getElementById('quantity');
        var value = parseInt(input.value, 10);
        if (value < 10) {
            input.value = value + 1;
        }
    });

    document.getElementById('decrementBtn').addEventListener('click', function() {
        var input = document.getElementById('quantity');
        var value = parseInt(input.value, 10);
        if (value > 1) {
            input.value = value - 1;
        }
    });
</script>