<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Payment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body
        {
            background: rgb(227,255,244);
            background: linear-gradient(356deg, rgba(227,255,244,1) 0%, rgba(248,218,255,1) 100%);
        }
    </style>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        var order_id = urlParams.get('order_id');   //Get orderid from url
        var amount = urlParams.get('amount');   //Get amount from url

        console.log(order_id,amount);

        $(document).ready(function(){
            var options = {
                "key": "rzp_test_vgrShf9dHH7C80", // Enter the Key ID generated from the Dashboard
                "amount": amount*100,
                "currency": "INR",
                "description": "Ambulance Service",
                "image": "https://s3.amazonaws.com/rzp-mobile/images/rzp.jpg",
                "prefill":
                {
                "email": "ghgfhfgh",
                "contact": "",
                },
                config: {
                display: {
                    blocks: {
                    utib: { //name for Axis block
                        name: "Pay using Axis Bank",
                        instruments: [
                        {
                            method: "card",
                            issuers: ["UTIB"]
                        },
                        {
                            method: "netbanking",
                            banks: ["UTIB"]
                        },
                        ]
                    },
                    other: { //  name for other block
                        name: "Other Payment modes",
                        instruments: [
                        {
                            method: "card",
                            issuers: ["ICIC"]
                        },
                        {
                            method: 'netbanking',
                        },
                        {
                            method: "upi"
                        }
                        ]
                    }
                    },
                    sequence: ["block.utib", "block.other"],
                    preferences: {
                    show_default_blocks: false // Should Checkout show its default blocks?
                    }
                }
                },
                "handler": function (response) {
                var pid = response.razorpay_payment_id;
                console.log(pid);

                //ajax goes here
                $.ajax({
                    url:'{{route('make-payment-page')}}',
                    type:'GET',
                    data:{'order_id':order_id,'pid':pid},
                    success:function(data){
                        console.log(data);
                        window.location.href="{{url('/')}}/hcs_payment_success";
                    }
                })

                },
                "modal": {
                "ondismiss": function () {
                    if (confirm("Are you sure, you want to close the form?")) {
                    txt = "You pressed OK!";
                    console.log("Checkout form closed by the user");
                    } else {
                    txt = "You pressed Cancel!";
                    console.log("Complete the Payment")
                    }
                }
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        })
</script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</body>
</html>