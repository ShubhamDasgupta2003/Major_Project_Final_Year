<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="conatiner">
        <h2 class="text-success bg-success">Ride Confirmed</h2>
        <div class="container d-flex flex-column justify-content-center align-items-center" style="height:100vh">
 
 <div class="card" style="width: 25rem;">
<div class="card-body text-center">
    <h1>{{$amb_info[0]->amb_name}}</h1>
    <h4>Driver name: {{$amb_info[0]->amb_driver_name}}</h4>
    <h4>Ambulance no: {{$amb_info[0]->amb_no}}</h4>
    <h4>Contact no: {{$amb_info[0]->amb_contact}}</h4>
    <h1>OTP - {{$ptn_info[0]->otp}}</h1>
    <p class="form-text">Please share the otp to the driver</p>
</div>
</div>
</div>
    </div>
</body>
</html>