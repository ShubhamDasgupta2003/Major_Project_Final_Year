{{-- {{$detaildorders->order_id}}
{{$detaildorders->pat_name}}
{{$detaildorders->pat_age}}
{{$detaildorders->user_id}} --}}

<!DOCTYPE html>
<html>
<head>
    <title>Make Payment</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 10px;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            margin: 0 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Order Details - #{{$order_details[0]->invoice_no}}</h1>
        <p>Name: {{$order_details[0]->patient_name}}</p>

        <p>Contact Number: {{$order_details[0]->patient_mobile}}</p>
        <p>Booked at: {{$order_details[0]->patient_booking_address }}</p>
        <p>Destination: {{ $order_details[0]->dest_address}}</p>
        <p>Booking date: {{ $order_details[0]->booking_date}}</p>
        <p>Booking time: {{ $order_details[0]->booking_time}}</p>
        <p>Amount: {{$order_details[0]->amount}}/-</p>

       
    </div>

   
   
</body>
</html>

