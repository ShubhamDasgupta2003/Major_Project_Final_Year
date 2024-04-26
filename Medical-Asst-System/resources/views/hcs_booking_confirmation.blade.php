
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/bookingConfirmation.css">
    <title>Confirmation | Thank you</title>
</head>
<body>
    <div class="container">
        <h2 id="cnfm-msg"><i class="fa-solid fa-circle-check fa-bounce fa-2xl" style="color: #00a896;"></i>
            &nbsp;Booking Confirmed!</h2>
        <div class="thank-you-message">Your details has been received.
        </div>
        <hr>
        <p id="p1"><u>Mediacl Technicians information.</u></p>
        <div class="hspl-details">
            <div class="c1"><strong class="attribute1">Name:</strong></div>
            <div class="c1"><strong class="attribute1">Organization Name:</strong></div>
        </div>
        <p id="p1"><u>Other information</u></p>
        <div class="other-details">
            <div class="c2"><strong class="attribute3">Your name:</strong></div>
            <div class="c2"><strong class="attribute4">Contact Number:</strong></div>
            <div class="c2"><strong class="attribute2">Address:</strong>
            <div class="c1"><strong class="attribute2">Land Mark:</strong>
            <div class="c2"><strong class="attribute6">Booking Date and Time</strong>
            </div>
        </div>
        <!-- <p>Go back to <a href="/">Homepage</a></p> -->
        <div class="btns">
            <a href="{{route('home')}}">
                <br>
                <button class="btn">Home</button>
            </a>
        </div>
    </div>
</body>

</html>