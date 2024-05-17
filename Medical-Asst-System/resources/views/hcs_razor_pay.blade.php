<!DOCTYPE html>
<html>
<head>
    <title>HCS Razor Pay</title>
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
        <h1>User Details:</h1>
        <p>Name: {{ $userdata->name }}</p>
        <p>Gender: {{ $userdata->gender }}</p>
        <p>Contact Number: {{ $userdata->contact_num }}</p>
        <p>Landmark: {{ $userdata->land_mark }}</p>
        <p>Address: {{ $userdata->address }}</p>
        <p>District: {{ $userdata->district }}</p>
        <p>State: {{ $userdata->state }}</p>
        <p>PIN Code: {{ $userdata->pincode }}</p>
        <p>Amount to Pay: 500</p>

        <div class="button-container">
           <a href="{{route('hcs_payment', ['order_id' => $userdata->order_id, 'amount' => 500  ])}}"> <button id="payBtn">Proceed to Pay</button></a>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#payBtn').on('click', function() {
                // Extract data from the page
                const urlParams = new URLSearchParams(window.location.search);
                var order_id = urlParams.get('order_id');   //Get orderid from url
                var amount = urlParams.get('amount');   //Get amount from url

                // Make AJAX request to the controller
                $.ajax({
                    url: "{{ route('send.data') }}",
                    type: "GET",
                    data: { order_id: order_id, amount: amount },
                    success: function(response) {
                        // Handle response from the controller if needed
                        {{-- console.log(response); --}}
                        
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>