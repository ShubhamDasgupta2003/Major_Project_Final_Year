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
            background: rgb(227,255,244);
            background: linear-gradient(356deg, rgba(227,255,244,1) 0%, rgba(248,218,255,1) 100%);
        }
        .profile
        {
          color:blue;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


<nav class="navbar navbar-light container-fluid bg-light shadow-sm p-1  bg-body rounded">
            
            <a class="navbar-brand text-primary ms-5">Navbar</a>

            <div class="d-flex">
                <h2 class="me-2 text-light"> 
                <!-- Example single danger button -->
                <div class="btn-group dropstart profile">
                <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="row">
                        <div class="col-1">
                        <i class="fa-regular fa-user fa-xl" style="color: #0470ce;"></i>
                    </div>
                </button>
                <ul class="dropdown-menu">
                    <li><h4 class="dropdown-item">{{session('user_name')}}</h4></li>
                </ul>
                </div>
            </h2>
            </div>
        </div>
        </nav>

    <div class="container d-flex flex-column justify-content-center align-items-center" style="height:100vh">

   
    <h1 id="status">Booking ride</h1>
        <div class="card shadow p-3 mb-5 bg-body rounded mt-3" style="width:25rem;height:20rem">
            <div class="card-body rounded p-3">
                <h4 class="card-subtitle mb-2 text-center p-2" id="srvc_amb_no"></h4>
                <h4 class="card-title d-flex flex-column justify-content-center align-items-center text-center" id="srvc_name">
                <div class="spinner-grow text-success" role="status"></div>     <div class="comment mt-3 text-center">Please wait...</div>
                <div class="comment mt-3">While we confirm your ride</div>
                </h4>
                <h4 class="card-text text-center" id="srvc_driver"></h4>
                <h4 id="srvc_mob" class="text-center"></h4>
                <h5 id="track_btn" class="text-center mt-3"></h5>
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

                            var service_name = '<i class="fa-solid fa-truck-medical"></i> ',
                            service_van_no = '',
                            service_mob = '<i class="fa-solid fa-square-phone"></i> ',
                            service_driver = '<i class="fa-solid fa-user-nurse"></i> ';

                            service_van_no+= patient_info.amb_no;
                            service_name+= amb_info.amb_name;
                            service_mob+= amb_info.amb_contact;
                            service_driver+= amb_info.amb_driver_name;
                            var link = '{{url('/')}}/amb-ptn-ride-confirmed?ptn_lat='+patient_info.patient_booking_lat+"&ptn_lng="+patient_info.patient_booking_lng+"&amb_lat="+patient_info.amb_current_lat+"&amb_lng="+patient_info.amb_current_lng+"&amb_no="+patient_info.amb_no+"&inv_no="+patient_info.invoice_no;

                            $('#srvc_amb_no').html(service_van_no);
                            $('#srvc_amb_no').css({"background-color":"#ffa600","color":"#000000"})
                            $('#srvc_name').html(service_name);
                            $('#srvc_name').css("color","#006aff");
                            $('#srvc_mob').html(service_mob);
                            $('#srvc_mob').css('color',"#16a300");
                            $('#srvc_driver').html(service_driver);
                            $('#srvc_driver').css('color',"#003870");
                            $('#status').html('Ride Booked successfully');
                            $('#status').css("color","green");
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