{{-- {{$detaildorders->order_id}}
{{$detaildorders->pat_name}}
{{$detaildorders->pat_age}}
{{$detaildorders->user_id}} --}}

<!DOCTYPE html>
<html>
<head>
    <title>Make Payment</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <style>
        .logo
        {
            color: rgb(68, 68, 68);
            text-decoration: none;
            font-size: 1.7rem;
            margin-left: 7px;
        }
    </style>
</head>
<body>

    <div class="container">
    <div class="container d-flex flex-column justify-content-center align-items-center" style="height:100vh">
        <div class="card-body mt-3 bg-light pt-3 pb-3 shadow-lg p-3 mb-5 bg-body rounded" style="width: 35rem;">
        <div class="row">
            <div class="col-md-12 text-center mb-3">
                <a href="#" class="logo"><i class="fa-solid fa-heart-pulse" style="color: #00a896;"></i>Medilities</a>
            </div>
        </div>
    
        <h3 class="text-center bg-success text-light">Order Details - #{{$order_details[0]->invoice_no}}</h3>
    <div class="card-body">
    Name: <h5>{{$order_details[0]->patient_name}}</h5>
    Contact Number:  <h5>{{$order_details[0]->patient_mobile}}</h5>
    Booked at:<h5>{{$order_details[0]->patient_booking_address }}</h5>
    Destination: <h5>{{ $order_details[0]->dest_address}}</h5>
    Booking date:<h5> {{ $order_details[0]->booking_date}}</h5>
    Booking time:<h5> {{ $order_details[0]->booking_time}}</h5>
    Amount:<h5> {{$order_details[0]->amount}}/-</h5>
    Payment-id:<h5> {{$order_details[0]->payment_id}}</h5>

    </div>
    
    </div>

   
   
</body>
</html>

