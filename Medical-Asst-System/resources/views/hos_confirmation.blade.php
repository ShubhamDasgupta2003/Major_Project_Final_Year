<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/BedBook/confirmation.css')}}">
    <title>Confirmation | Thank you</title>
</head>

<body>
    <div class="container">
        <h2 id="cnfm-msg"><i class="fa-solid fa-circle-check fa-bounce fa-2xl" style="color: #00a896;"></i>
            &nbsp;Booking Confirmed!</h2>
        <div class="thank-you-message">Your details has been received. Please proceed to the hospital for treatment.
        </div>
        <hr>
        <p id="p1"><u>Hospital information</u></p>
        <div class="hspl-details">
            
                <div class='c1'><strong class='attribute1'>Name:</strong>{{$hos_info_all->hos_name}}</div>
            <div class='c1'><strong class='attribute2'>Address:</strong>{{$hos_info_all->hos_address}}</div>
            <div class='c1'><strong class='attribute7'>District:</strong>{{$hos_info_all->hos_district}}</div>
            <div class='c1'><strong class='attribute2'>Number:</strong>{{$hos_info_all->hos_contactno}}</div>

        </div>
        <p id="p1"><u>Other information</u></p>
        <div class="other-details">
                        <div class='c2'><strong class='attribute3'>Patient name:</strong>{{$pnt_info_all->pnt_first_name}} {{$pnt_info_all->pnt_last_name}}</div>
                        <div class='c2'><strong class='attribute9'>Patient id:</strong>{{$pnt_info_all->pnt_id}}</div>
                <div class='c2'><strong class='attribute8'>Gender:</strong>{{$pnt_info_all->pnt_gender}}</div>
                 <div class='c2'><strong class='attribute4'>Number:</strong>{{$pnt_info_all->pnt_contactno}}</div>
                 <div class='c2'><strong class='attribute6'>Booking Date & Time:</strong>{{$pnt_info_all->pnt_booking_date}}</div>
                 @php
                    use Carbon\Carbon;
                    $deadline_timestamp=$pnt_info_all->pnt_booking_deadline_timestamp;
                     $deadline_dateTime = Carbon::createFromTimestamp($deadline_timestamp)->toDateTimeString();
                 @endphp
                 <div class='c2'><strong class='attribute6'>Deadline Date & Time:</strong>{{$deadline_dateTime}}</div>
    
                <p class = 'notice'>Note: Your bed reservation will automatically cancelled if you do not arrive at hospital within four hours of Booking time.</p>
        </div>
        <div class="btns">
            <form method="post"><button name="get_route" class="btn">get route</button></form>
            <a href="{{route('home')}}">
                <button class="btn">go to homepage</button>
            </a>
        </div>
    </div>
</body>

</html>