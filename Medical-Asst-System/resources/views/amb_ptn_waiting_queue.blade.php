<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ride Assignment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <style>
        body
        {
            background: rgb(255,224,174);
            background: linear-gradient(324deg, rgba(255,224,174,1) 38%, rgba(148,255,200,1) 59%, rgba(152,202,255,1) 100%);
        }
    </style>
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center" style="height:100vh">

   
    <h1 id="status">Booking ride</h1>
        <div class="card mt-3" style="width: 25rem;height:15rem">
            <div class="card-body rounded">
                <h5 class="card-title d-flex flex-column justify-content-center align-items-center" id="srvc_name">
                <div class="spinner-grow text-success" role="status"></div>     <div class="comment mt-3">Please wait...</div>
                <div class="comment mt-3">While we confirm your ride</div>
                </h5>
                <h6 class="card-subtitle mb-2 text-muted" id="srvc_amb_no"></h6>
                <p class="card-text" id="srvc_driver"></p>
                <h4 id="srvc_mob"></h4>
                <h5 id="track_btn"></h5>
            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            var  checkAjax = function()
            {
                    $.ajax({
                    url:'{{route('assignedRidePatient')}}',
                    type:'GET',
                    success:function(data){
                        if(data.data)
                        {
                            var patient_info = data.data.ptn_data[0];
                            var amb_info = data.data.amb_data[0];

                            console.log(data.data);

                            var service_name = '<i class="fa-solid fa-truck-medical"></i>',
                            service_van_no = '',
                            service_mob = '<i class="fa-solid fa-square-phone"></i>',
                            service_driver = '<i class="fa-solid fa-user-nurse"></i> ';

                            service_van_no+= patient_info.amb_no;
                            service_name+= amb_info.amb_name;
                            service_mob+= amb_info.amb_contact;
                            service_driver+= amb_info.amb_driver_name;
                            var link = '{{url('/')}}/amb-ptn-ride-confirmed?ptn_lat='+patient_info.patient_booking_lat+"&ptn_lng="+patient_info.patient_booking_lng+"&amb_lat="+patient_info.amb_current_lat+"&amb_lng="+patient_info.amb_current_lng+"&amb_no="+patient_info.amb_no;

                            $('#srvc_amb_no').html(service_van_no);
                            $('#srvc_name').html(service_name);
                            $('#srvc_mob').html(service_mob);
                            $('#srvc_driver').html(service_driver);
                            $('#status').html('Ride Booked successfully');
                            $("#track_btn").html("<a href="+link+"><button class='btn btn-success'>Track ambulance</button></a>")
                        }
                    }
                })
            }

            setInterval(checkAjax,4000);
        })
    </script>

</body>
</html>