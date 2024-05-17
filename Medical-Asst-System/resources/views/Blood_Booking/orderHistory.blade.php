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
            </div>
        </div>
    </div>

    {{---------------------------   order history of your service  ---------------------}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-4">Ambulance order History</h2>
                <!-- Sample Order Cards -->
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