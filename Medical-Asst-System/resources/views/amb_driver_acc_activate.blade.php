<!DOCTYPE html>
<html>
<head>
    <title>Geolocation</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');

        
        .marker-btn {
            background-color: green;
            color: white;
            font-weight: bold;
            border: 0px solid white;
            border-radius: 5px;
            cursor: pointer;
        }
        .leaflet-marker-icon.ptn-marker {
            border:5px solid red;
        }
        .navbar
        {
            /* background-color:rgb(0,120,232); */
            padding-right:1rem;
        }
        .profile
        {
          color:blue;
        }
        .links a
        {
            text-decoration:none;
            margin-right:2rem;
            font-size:17px;
            font-family: "Ubuntu", sans-serif;
            font-weight: 400;
            font-style: normal;
            color: #217bff;
            padding:1.3rem;
        }
        .links a:hover
        {
            font-size: 19px;
            /* background-color: #217bff; */
            /* color: white; */
        }
    </style>

</head>

<body>

        <nav class="navbar navbar-light container-fluid bg-light shadow-sm p-1  bg-body rounded">
            
            <a class="navbar-brand text-primary ms-5">Navbar</a>
            <div class="row">
                <div class="col-md-12 mr-5 ml-5 links">
                <a href="#">Home</a>
                <a href="#">Services</a>
                <a href="#">Review</a>
                <a href="#">Contact us</a>
                </div>
                
            </div>
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
                    <li><h4 class="dropdown-item">{{$driver_details[0]->amb_driver_name}}</h4></li>
                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> My Profile</a></li>
                </ul>
                <!--  -->
                </div>
            </h2>
            </div>
        </div>
        </nav>
        <div class="container d-flex flex-column justify-content-center align-items-center" style="height:100vh">
        <div class="card" style="width: 25rem;">
        <p class="alert alert-success mb-3" id="alert_box"></p>
    <div class="card-body">
        <h5 class="card-title">Account Activation</h5>
        
        <label for="inputPassword5" class="form-label mt-3">Email-id</label>
        <input type="email" id="emailid" name="emailid" class="form-control" placeholder="Enter your registered email id">

        <div id="passwordHelpBlock" class="form-text">
          This step is just for safety purpose, so that your account don't get activated accidently without your knowledge.
        </div>
        <button id="activate_acc" class="btn btn-success mt-5">Activate</button>
    </div>
</div>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>

      const searchParams = new URLSearchParams(window.location.search);
      var amb_no = searchParams.get('amb_no');

      $(document).ready(function(){
        $('#alert_box').hide();
        $('#activate_acc').on('click',function(){
          var email = $('#emailid').val();
          console.log(email);
          console.log("activated");
          $.ajax({
            url:"{{route('driverActivate')}}",
            type:'GET',
            data:{'email':email,'amb':amb_no},
            success:function(data){
              console.log(data);
              if(data.data==1)
              {
                $('#alert_box').show();
                $('#alert_box').html("Account activated successfully");
                window.location.href="/login";
              }
              else
              {
                $('#alert_box').show();
                $('#alert_box').html("Invalid email id");
              }
            }
          })
        })
      })
    </script>
</body>

</html>