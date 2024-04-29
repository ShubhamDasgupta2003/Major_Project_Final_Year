<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Payment</title>
    <style>
        body
        {
            background: rgb(227,255,244);
            background: linear-gradient(356deg, rgba(227,255,244,1) 0%, rgba(248,218,255,1) 100%);
        }
    </style>
</head>
<body>

<div class="container d-flex flex-column justify-content-center align-items-center" style="height:100vh">
 
        <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 25rem;">
    <div class="card-body p-5">
        <h5 class="card-title bg-primary p-2 text-light text-center border rounded">Payment Details</h5>

        <form id="payment_form" method="post" action="{{route('processPayment')}}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="inputPassword5" class="form-label mt-3">Patient name</label>
                    <input type="email" id="inputPassword5" name="patient_name" class="form-control" value="{{$ptn_detail[0]->patient_name}}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword5" class="form-label mt-3">Patient mobile</label>
                    <input type="email" id="inputPassword5" name="patient_mob" class="form-control" value="{{$ptn_detail[0]->patient_mobile}}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="inputPassword5" class="form-label mt-3">User Id</label>
                    <input type="email" id="inputPassword5" name="user_id" class="form-control" value="{{$ptn_detail[0]->user_id}}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="inputPassword5" class="form-label mt-3">Order Id</label>
                    <input type="email" id="inputPassword5" name="order_id" class="form-control" value="{{$ptn_detail[0]->invoice_no}}" readonly>
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-6">
                    <input type="email" id="inputPassword5" name="amount" class="form-control mt-2" value="{{round($amount)}}" readonly>
                </div>
                <div class="col-md-6">
                    
                </div>
                <button type='submit' class='btn btn-success text-center mt-2' name='start_payment'>Confirm & Pay</button>
            </div>
            <div id="passwordHelpBlock" class="form-text">
            Make sure you check the details of patient in the payment section.
            </div>
        </form>
    </div>
</div>
</div>
    
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>


</body>
</html>