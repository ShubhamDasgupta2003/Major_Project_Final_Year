
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/Medical Supplies/navbar.css">
    <link rel="stylesheet" href="css/Medical Supplies/amb_form_booking.css">
    <link rel="stylesheet" href="css/Medical Supplies/navlink.css">

</head>
<body>
    <div class="container">
        <div class="card">
            <div class="column">
                <h1 id="cnfm-msg"><i class="fa-solid fa-circle-check fa-bounce fa-2xl" style="color: #27b300;"></i> &nbsp;Booking Confirmed!</h1>
                <div class="amb_info_cont">
                    <h3>Your Order  is confirmed . Regarding any question about the order contact us with your registered </h3>
                    <p class="descp" id="card-type"></p>
                    <p class="descp" id="card-address"><i class="fa-solid fa-calendar-days"></i>></i> Estimated Arrival</p>
                    <p class="descp" id="card-type"><?php echo date('Y-m-d', strtotime("+10 days")); ?></p>
                    <h2 class="descp" id="card-fare">Total Price: &#8377  </h2>
                    <div class="bton">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>