{{-- {{$detaildorders->order_id}}
{{$detaildorders->pat_name}}
{{$detaildorders->pat_age}}
{{$detaildorders->user_id}} --}}

<!DOCTYPE html>
<html>
<head>
    <title>Make Payment</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
        <h1>Order Details</h1>
        <p>Name: {{$detaildorders->pat_name}}</p>
        <p>Blood Group: {{$detaildorders->blood_gr}}</p>
        {{-- <p>Email: {{ $detaildorders->email }}</p> --}}
        <p>Gender: {{ $detaildorders->pat_gender }}</p>
        <p>Contact Number: {{$detaildorders->phone_no}}</p>
        <p>Address: {{$detaildorders->address }}</p>
        <p>Landmark: {{ $detaildorders->landmark }}</p>
        {{-- <p>District: {{ $userdata->district }}</p>
        <p>State: {{ $userdata->state }}</p>
        <p>PIN Code: {{ $userdata->pincode }}</p> --}}
        <p>Amount: {{$detaildorders->price}}</p>

        <p> <a href="/user_rating" class="btn btn-sm btn-success"> Rate Our Service </a> </p>
       
    </div>

   
   
</body>
</html>

