<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Hospital Registration Form</title>
    <!---Custom CSS File--->
    {{-- <link rel="stylesheet" href="{{asset('css/BedBook/hosp_register.css')}}" /> --}}
    <link href="{{ asset('css/BedBook/hosp_register.css') }}" rel="stylesheet">
  </head>
  <body>
    <section class="container">
      <div class="title-bar">
        {{-- <img src="\Minor Project 5th_Sem\Emergency_Medical_Support_System\HomePage\images\logo.png" alt="logo" width="70px"> --}}
        {{-- <img src="{{asset('images/BedBook/logo.png alt="logo" width="70px"')}}"> --}}
        <img src="{{asset('images/BedBook/logo.png')}}">
        <header>Hospital Registration Form</header>
      </div>
      <form class="form" method="POST" action="/hos_register_data">
        @csrf
        <div class="column">
          <div class="input-box">
            <label>Hospital Name</label>
            <input name="hos_name" type="text" placeholder="Enter the hospital name" required/>
          </div>
        </div>
        <div class="input-box">
          <label>Email Address</label>
          <input name="hos_email" type="text" placeholder="Enter email address" required />
        </div>
        <div class="input-box">
          <label>Latitude</label>
          <input name="hos_lat" type="number" step="any" placeholder="Enter hospital latitude" required/>
        </div>
        <div class="input-box">
          <label>Longitude</label>
          <input name="hos_long" type="number" step="any" placeholder="Enter hospital longitude" required/>
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input name="hos_contactno" type="number" placeholder="Enter phone number" required minlength="10" maxlength="10"/>
          </div>
        </div>
        <div class="input-box">
          <label>Address</label>
          <input name="hos_address" type="text" placeholder="Enter hospital address" required />
        </div>
        <div class="input-box address">
          <label>Other details</label>
          <div class="column">
            <div class="select-box" >
                <select name="hos_district">
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
            <input type="text" placeholder="Enter the city / village" required name="hos_city">
          </div>
          <div class="column">
            <input type="text" placeholder="Enter the state" required name="hos_state"/>
            <input type="number" placeholder="Enter postal code" required name="hos_pincode"/>
          </div>
          <div class="column">
            <input type="number" placeholder="Enter male bed available" required name="hos_male_bed_available"/>
            <input type="number" placeholder="Enter female bed available" required name="hos_female_bed_available"/>
          </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Password</label>
                <input id="pswd" type="password" placeholder="Enter your password" required name="hos_password" />
            </div>
            <div class="input-box">
                <label>Confirm Password</label>
                <input id="cnf-pswd"type="text" placeholder="Confirm your password" required name="hos_password" />
            </div>
        </div>
        <div class="input-box">
            <label>Bed Charge</label>
            <input name="hos_bed_charge" type="number" placeholder="Enter bed charge" />
          </div>
        <button id="sbmt-form" name="register_hosp">Register</button>
      </form>
    </section>
    <script src="{{asset('js/BedBook/hosp_register.js')}}"></script>
    <script src="{{asset('js/BedBook/location_hosp_reg.js')}}"></script>
  </body>
</html>