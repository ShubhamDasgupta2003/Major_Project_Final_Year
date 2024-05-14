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
        }
        .order-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
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
                @foreach ($orders as $order)
                <div class="order-card">
                    {{-- <h5>Order #{{ $order->order_id }}</h5> --}}
                    <div class="order-details">
                        <div>
                            <img src="images/BloodB/Blood_Bank.png" style="width: 50px; height: 50px;" alt="">
                        </div>
                        {{$order->blood_age}}
                        {{$order->blood_customer_name}}
                        {{-- <div>
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
                            <p>Status: {{ $order->order_status }}</p>
                        </div>
                        <p><a href="{{ route('order_detail', ['order_id' => $order->order_id]) }}" class="btn btn-success btn-d">Details</a></p> --}}
                        <p><button class="btn btn-danger">Cancel Order</button> </p>
                        <p><button class="btn btn-success btn-d">Book Again</button></p>
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
