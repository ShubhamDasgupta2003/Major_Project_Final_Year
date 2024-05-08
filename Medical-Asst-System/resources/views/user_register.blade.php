<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--<title>Registration Form in HTML CSS</title>-->
    <!---Custom CSS File--->
    {{-- <link rel="stylesheet" href="css/signup.css" /> --}}
    <link href="{{ asset('css/Homepage/signup.css') }}" rel="stylesheet">
  </head>
  <body>
    <section class="container">
      <div class="title-bar">
        <img src="{{asset('images/Bedbook/logo.png')}}" alt="logo" width="70px">
        <header>New User Registration Form</header>
      </div>
      <form class="form" method="post" action="{{ route('register.user') }}">
        @csrf
        <div class="column">
          <div class="input-box">
            <label>First Name</label>
            <input name="user_first_name" type="text" placeholder="Enter your first name" required/>
          </div>

          <div class="input-box">
            <label>Last Name</label>
            <input name="user_last_name" type="text" placeholder="Enter your last name" required />
          </div>
        </div>
        <div class="input-box">
          <label>Email Address</label>
          <input name="user_email" type="text" placeholder="Enter email address" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input name="user_contactno" type="number" placeholder="Enter phone number" required minlength="10" maxlength="10"/>
          </div>
          <div class="input-box">
            <label>Date of Birth</label>
            <input name="user_dob" id="dtpick" type="date" placeholder="Enter birth date" required/>
          </div>
        </div>
        <div class="column">
          <div class="input-box">
          <label for="">ID Type</label>
          <div class="select-box">
                <select name="id_no" id="">
                    <option value="Aadhaar">Aadhar Card</option>
                    <option value="Voter">Voter Card</option>
                </select>
            </div>
          </div>
            <div class="input-box">
                <label>ID Number</label>
                <input name="user_aadhaar" type="number" placeholder="Enter ID number" required />
            </div>
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="user_gender" checked value="Male"/>
              <label for="check-male">Male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="user_gender" value="Female"/>
              <label for="check-female">Female</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-other" name="user_gender" value="Others"/>
              <label for="check-other">others</label>
            </div>
          </div>
        </div>
        <div class="input-box address">
          <label>Address</label>
          <div class="column">
            <div class="select-box" >
                <select name="user_district">
                {{-- <option value="" selected disabled>Select District</option > --}}
                    <option hidden>District</option>
                                <option>Alipurduar</option>
                                <option>Bankura</option>
                                <option>Birbhum</option>
                                <option>Cooch Behar</option>
                                <option>Dakshin Dinajpur</option>
                                <option>Darjeeling</option>
                                <option>Hooghly</option>
                                <option>Howrah</option>
                                <option>Jalpaiguri</option>
                                <option>Jhargram</option>
                                <option>Kalimpong</option>
                                <option>Kolkata</option>
                                <option>Malda</option>
                                <option>Murshidabad</option>
                                <option>Nadia</option>
                                <option>North 24 Parganas</option>
                                <option>Paschim Bardhaman</option>
                                <option>Paschim Medinipur</option>
                                <option>Purba Bardhaman</option>
                                <option>Purba Medinipur</option>
                                <option>Purulia</option>
                                <option>South 24 Parganas</option>
                                <option>Uttar Dinajpur</option>
                </select>
            </div>
            <input type="text" placeholder="Enter your city/vill" required name="user_city">
          </div>
          <div class="column">
            <input type="text" placeholder="Enter your state" required name="user_state"/>
            <input type="number" placeholder="Enter postal code" required name="pincode"/>
          </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>Current Latitude</label>
            <input type="number" name="ptn_lat_reg" id="amb_lat_view" readonly>
          </div>
          <div class="input-box">
            <label>Current Longitude</label>
            <input type="number" name="ptn_lng_reg" id="amb_lon_view" readonly>
          </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label for="amb_addr_reg" >Current Address</label>
            <input type="text" name="ptn_addr_reg" id="amb_address_view">
          </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Password</label>
                <input id="pswd" name="user_password" type="password" placeholder="Enter your password" required />
            </div>
            <div class="input-box">
                <label>Confirm Password</label>
                <input id="cnf-pswd"type="text" placeholder="Confirm your password" name ="user_password" required />
            </div>
        </div>
        <button id="sbmt-form" type="submit" name="register_user">Register</button>
      </form>
    </section>
    <script src="{{ asset('js/amb_admin_loc.js') }}"></script>
  </body>
</html>