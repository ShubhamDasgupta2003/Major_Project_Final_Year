{{$orders->order_id}}
{{$orders->order_type}}
{{$orders->user_id}}
{{$orders->bank_id}}
{{$orders->pat_name}}
{{$orders->pat_age}}
{{$orders->pat_gender}}
{{$orders->phone_no}}
{{$orders->prex}}
{{$orders->order_status}}
{{$orders->blood_gr}}
{{$orders->quantity}}
{{$orders->price}}
{{$orders->date}}
{{$orders->time}}

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
        <h1>Order Preview</h1>
        <p>Name: {{$orders->pat_name}}</p>
        <p>Gender: {{ $orders->pat_gender }}</p>
        <p>Contact Number: {{$orders->phone_no}}</p>
        <p>Address: {{ $orders->address }}</p>
        <p>Landmark: {{ $orders->landmark }}</p>
        {{-- <p>District: {{ $userdata->district }}</p>
        <p>State: {{ $userdata->state }}</p>
        <p>PIN Code: {{ $userdata->pincode }}</p> --}}
        <p>Amount to Pay: {{$orders->price}}</p>

        <div class="button-container">
            {{-- <button id="editBtn">Edit</button> --}}
           <a href="{{ route('proceedToPay', ['order_id' => $orders->order_id, 'amount' => $orders->price,'service_type'=>$orders->order_type]) }}"> <button id="payBtn">Proceed to Pay</button></a>
        </div>
    </div>

   
</body>
</html>

<script>
    $.ajax({
    url: "{{ route('process_payment') }}",
    type: "GET",
    data: { order_id: order_id, amount: amount,type:type },
    success: function(response) {
        if (response.success) {
            // Payment record saved successfully
            // Redirect the user or perform other actions
            window.location.href = "{{ url('/') }}/payment-success";
        } else {
            // Payment record failed to save
            // Handle the error or display a message to the user
            console.error("Failed to save payment record.");
        }
    },
    error: function(xhr, status, error) {
        // Handle errors
        console.error(xhr.responseText);
    }
});

</script>