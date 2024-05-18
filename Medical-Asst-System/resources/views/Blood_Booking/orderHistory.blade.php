<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            margin-top: 50px;
            height: 100px;
        }
        .order-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 5px;
            margin-bottom: 7px;
        }
        .order-card h5 {
            margin-bottom: 10px;
        }
        .order-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .order-actions {
            margin-top: 10px;
        }
        .btn {
            cursor: pointer;
        }
        .btn-d {
            margin-top: 0%;
            color: #fff;
            background-color:#40bba2;
            border-color:#8dd8c9;
            /* margin-bottom: 16px; */
        }
        .btn-d:hover {
            background-color:#009879;
            border-color:#297c6c;
            color: #fff;
        }
    </style>
</head>


<body>
    {{---------------------------  1. order history for Blood booking service  ---------------------}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-4">Order History</h2>
                <!-- Sample Order Cards -->

                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                @foreach ($bld_orders as $order)
                {{-- @endif --}}

                <div class="order-card">
                    <h5>ORDER ID: #{{ $order->order_id }}</h5>
                    <div class="order-details">
                        <div>
                            <img src="images/BloodB/Blood_Bank.png" style="width: 50px; height: 50px;" alt="">
                        </div>
                       
                        <div>
                            <p>Quantity: {{ $order->quantity }}</p>
                        </div>
                        <div>
                            <p>Total Amount: ₹ {{ $order->price }}</p>
                        </div>
                        <div>
                            <p>Order Date: {{ $order->date }}</p>
                        </div>
                        <div>
                            <p>Order Time: {{ $order->time }}</p>
                        </div>
                        <div>
                            @php
                                $status = $order->order_status;
                                if ($status == 'complete')
                                    $status = 'Approved';
                            @endphp

                            <p>Status: {{ $status }}</p>
                        </div>
                        <p><a href="{{ route('order_detail', ['order_id' => $order->order_id]) }}" class="btn btn-success btn-d">Details</a></p>

                        @php
                        if ($order->order_status == 'complete'):
                        @endphp
                            <p><a href=" {{route('cancel_order',['order_id' => $order->order_id])}} " class="btn btn-danger">Cancel Order</a></p>
                        @php
                        endif;
                        @endphp
                    

                        <p> <a href=" {{route('showBhome')}} " class="btn btn-success btn-d">Book Again</a> </p>
                        <div class="order-actions">
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach ($medicalorders as $orderm)
                <div class="order-card">
                    <h5>Order #{{ $orderm->order_id }}</h5>
                    <div class="order-details">
                        <div>
                            <img src="images/BloodB/medicalsupplies.png" style="width: 50px; height: 50px;" alt="">
                        </div>
                       
                        <div>
                            <p>Quantity: {{ $orderm->product_quantity }}</p>
                        </div>
                        <div>
                            <p>Total Amount: ₹ {{ $orderm->product_rate }}</p>
                        </div>
                        <div>
                            <p>Order Date: {{ $orderm->created_at }}</p>
                        </div>
                        <div>
                            {{-- <p>User Email: {{ $orderm->user_email }}</p> --}}
                        </div>
                        <div>
                            @php
                                $status = $orderm->order_status;
                                if ($status == 'complete')
                                    $status = 'Approved';
                            @endphp

                            <p>payment: Completed</p>
                        </div>
                       

                       
                            <p><a href=" {{route('orderm.deletem',['order_id' => $orderm->order_id])}} " class="btn btn-danger">Cancel Order</a></p>
                     

                        <p> <a href=" {{route('medical_supplies.index')}} " class="btn btn-success btn-d">order Again</a> </p>
                        <div class="order-actions">
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach ($amb_orders as $order)
                <div class="order-card">
                    <h5>Order #{{ $order->order_id }}</h5>
                    <div class="order-details">
                        <div>
                            <img src="images\HomePage\ambulance.png" style="width: 50px; height: 50px;" alt="">
                        </div>
                       
                        <div>
                            <p>Quantity: 1</p>
                        </div>
                        <div>
                            <p>Total Amount: ₹ {{ $order->amount }}</p>
                        </div>
                        <div>
                            <p>Order Date: {{ $order->booking_date }}</p>
                        </div>
                        <div>
                            <p>Order Time: {{ $order->booking_time }}</p>
                        </div>
                        <div>
                            @php
                                $status = $order->ride_status;
                                if ($status == '111')
                                    $status = 'Completed';
                            @endphp

                            <p>Status: {{ $status }}</p>
                        </div>
                        <p><a href="{{ route('ambOrderDetails', ['order_id' => $order->order_id]) }}" class="btn btn-success btn-d">Details</a></p>

                        @php
                        if ($order->order_status == 'complete'):
                        @endphp
                            <p><a href=" {{route('cancel_order',['order_id' => $order->order_id])}} " class="btn btn-danger">Cancel Order</a></p>
                        @php
                        endif;
                        @endphp
                    

                        <p> <a href=" {{route('check-availability')}} " class="btn btn-success btn-d">Book Again</a> </p>
                        <div class="order-actions">
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach ($userdatas as $userdata)
                <div class="order-card">
                    <h5>Order #{{$userdata->order_id}}</h5>
                    <div class="order-details">
                        <div>@if($userdata->order_type == "A")
                                <img src="images\HomePage\babysitter.png" style="width: 50px; height: 50px;" alt="">
                        @elseif($userdata->order_type == "N")
                               <img src="images\HomePage\nurse.png" style="width: 50px; height: 50px;" alt="">
                            @else
                                <img src="images\employee.png" style="width: 50px; height: 50px;" alt="">
                            @endif
                        </div>
                       
                        <div>
                            <p>Order for:@if($userdata->order_type == "A")
                                {{"Aya"}}
                            @elseif($userdata->order_type == "N")
                                {{"Nurse"}}
                            @else
                                {{"Technician"}}
                            @endif</p>
                        </div>
                        <div>
                            <p>Payment Amount₹ 500</p>
                        </div>
                        <div>
                            <p>Order Date and Time: {{$userdata->created_at}}</p>
                        </div>
                        <div>

                            <p>{{$userdata->order_status}}</p>
                        </div>
                        <div>
                            <p>@if($userdata->order_status == "Completed")
                                <a href="{{route('hcs_add_rating', ['emp_id' => $userdata->emp_id ])}}">
                                    <button type="button" class="btn btn-primary">Add review</button>
                                </a>
                            @elseif($userdata->order_status == "Pending")
                                <a href="{{route('user_cancel_order', ['order_id' => $userdata->order_id ])}}">
                                    <button type="button" class="btn btn-danger">Cancel</button>
                                </a>
                            @endif</p>
                        </div>
                        <div class="order-actions">
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>

    {{---------------------------  2. order history for medichine service  ---------------------}}


     <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-4"></h2>
                <!-- Sample Order Cards -->
               
            </div>
        </div>
    </div>

    {{---------------------------  3. order history for ambulance service  ---------------------}}

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-4"> </h2>
                <!-- Sample Order Cards -->
                
            </div>
        </div>
    </div>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Sample Order Cards -->
              
             </div>
        </div>
    </div> 
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<script>
    // Calculate time difference and update cancel button status
    $(document).ready(function () {
        $('.cancel-btn').each(function () {
            var orderTime = $(this).data('order-time');
            var thirtyMinutes = 30 * 60 * 1000; // 30 minutes in milliseconds
            var cancelTime = new Date(orderTime).getTime() + thirtyMinutes;
            var currentTime = new Date().getTime();
            var timeDifference = cancelTime - currentTime;

            if (timeDifference > 0) {
                // If time difference is positive, set remaining time
                var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);
                $(this).prop('disabled', true);
                $(this).siblings('.cancel-time-remaining').text('Time remaining: ' + minutes + 'm ' + seconds + 's');
            } else {
                // If time difference is negative, disable the button
                $(this).prop('disabled', true);
                $(this).siblings('.cancel-time-remaining').text('Time expired');
            }
        });
    });