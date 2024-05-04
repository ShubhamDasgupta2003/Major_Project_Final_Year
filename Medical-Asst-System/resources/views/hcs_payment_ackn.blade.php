<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Payment Success</title>
    <style>
        body
        {
            background: rgb(227,255,244);
            background: linear-gradient(356deg, rgba(227,255,244,1) 0%, rgba(248,218,255,1) 100%);
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

<div class="container d-flex flex-column justify-content-center align-items-center" style="height:100vh">
 
        <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 25rem;">
    <div class="card-body p-5">
        <h4 class="card-title bg-success p-2 text-light text-center border rounded"><i class="fa-solid fa-circle-check fa-xl" style="color: #ffffff;"></i><br><br>Payment Successfull</h4>
        <h5 class="text-center">THANKYOU FOR PAYMENT</h5>
        <h3 class="text-center">Get well soon <i class="fa-regular fa-face-smile fa-xl" style="color: #ff66b0;"></i></h3>
    </div>
</div>
<a href="{{url('/')}}/"><button class="btn btn-primary">Go to Home</button></a>
</div>
    
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>


</body>
</html>