<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin login</title>
    <link rel="stylesheet" href={{asset('css/adminlogin.css')}} />
  </head>
  <body>
    <section class="container">
      <div class="title-bar">
        <header> Admin login</header>
      </div>
      <form method="post" class="form" action="{{route('login.validate')}}">
        @csrf
        <div class="column">
            <div class="input-box">
                <label>Email/Number</label>
                <input id="email" type="text" name="email_number" placeholder="Enter your email or number" required />
            </div>
            <div class="input-box">
                <label>Password</label>
                <input id="pswd"type="password" name="password" placeholder="Enter your password" required />
            </div>
            <div class="input-box menu" >
            <label>Service</label>
            <select id="service" name="service">
                <option hidden>Select Service</option>
                <option value = "Ambulance Service">Ambulance Service</option>
                <option value = "Blood Bank Service">Blood Bank Service</option>
                <option value = "Hospital Bed Booking Service">Hospital Bed Booking Service</option>
                <option value = "Medical Supplies Service">Medical Supplies Service</option>
                <option value = "Healthcare Support">Healthcare Support</option>
            </select>
            </div>
            
        </div>
        <button name="login" id="sbmt-form">login</button>
        {{-- <div class="signuplink">
          <div class="text">New user?</div>
          <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/admin_new_service_menu.php">click here</a>
        </div> --}}
        <!-- <div class="signuplink">
        <a href="signup.php?refresh=0">Forgot password</a>
        </div> -->
      </form>
    </section>
  </body>
</html>