<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/BloodBank/regbank.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-7">
              <div class="card shadow">
                
                <div class="card-header">
                   <div class="row "> <!--justify-content-center -->
                      <div class="col-md-9 "><h2>Blood Bank's Registration form </h2></div>   <!-- text-center -->
                      <div class="col-md-3"><a href="" class="btn btn-info">login</a></div>
                  </div>
                </div>
  
                <div class="card-body">
                  <form action="{{route('registerBanks')}}" method="post">
                    @csrf

                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if (Session::has('failed'))
                    <div class="alert alert-danger">{{Session::get('failed')}}</div>
                @endif

                      <div>
                        <label for="">Name</label>
                        <input type="text" name="name"  placeholder="Enter your Blood bank name" class="form-control">
                        <span class="text-danger">@error('name') {{ $message }}  @enderror</span>
                      </div>
                      <div>
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="Enter email" class="form-control">
                        <span class="text-danger">@error('email') {{ $message }}  @enderror</span>
                      </div>
                      
                      

                      <div>
                        <label for="">Latitude</label>
                        <input type="text" name="lat" placeholder="Enter your Latitude" class="form-control">
                        <span class="text-danger">@error('lat') {{ $message }}  @enderror</span>
                      </div>

                      <div>
                        <label for="">Longitude</label>
                        <input type="text" name="lon" placeholder="Enter your Longitude" class="form-control">
                        <span class="text-danger">@error('lon') {{ $message }}  @enderror</span>
                      </div>

                      <div>
                        <label for="">State</label>
                        <input type="text" readonly name="state" value="West Bengal" placeholder="Enter your state" class="form-control">
                        <span class="text-danger">@error('state') {{ $message }}  @enderror</span>
                      </div>
                                                         
                      <div>
                        <label for="">City</label>
                        <input type="text" name="city" placeholder="Enter your city" class="form-control">
                        <span class="text-danger">@error('city') {{ $message }}  @enderror</span>
                      </div>
  
                     
  
                      <label for="">Phone</label>
                      <input type="number" name="phone" placeholder="Enter your Longitude" class="form-control">
  
                       <label for="">Dist</label>
                      <!--<input type="text" name="branch" placeholder="Enter your district" > -->
  
                      <select name="dist" class="form-control">
                      <option value="" selected disabled>Select District</option>
                                          <option value="Alipurduar">Alipurduar</option>
                                          <option value="Bankura">Bankura</option>
                                          <option value="Birbhum">Birbhum</option>
                                          <option value="Cooch Behar">Cooch Behar</option>
                                          <option value="Dakshin Dinajpur">Dakshin Dinajpur</option>
                                          <option value="Darjeeling">Darjeeling</option>
                                          <option value="Hooghly">Hooghly</option>
                                          <option value="Howrah">Howrah</option>
                                          <option value="Jalpaiguri">Jalpaiguri</option>
                                          <option value="Jhargram">Jhargram</option>
                                          <option value="Kalimpong">Kalimpong</option>
                                          <option value="Kolkata">Kolkata</option>
                                          <option value="Malda">Malda</option>
                                          <option value="Nadia">Nadia</option>
                                          <option value="North 24 Parganas">North 24 Parganas</option>
                                          <option value="Paschim Bardhaman">Paschim Bardhaman</option>
                                          <option value="Paschim Medinipur">Paschim Medinipur</option>
                                          <option value="Purba Bardhaman">Purba Bardhaman</option>
                                          <option value="Purba Medinipur">Purba Medinipur</option>
                                          <option value="Purulia">Purulia</option>
                                          <option value="South 24 Parganas">South 24 Parganas</option>
                                          <option value="Uttar Dinajpur">Uttar Dinajpur</option>
                                          </select>
  
                      <label for="">Pin code</label>
                      <input type="text" name="pin" placeholder="Enter your Pincode" class="form-control">
                      

                      <div>
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Enter password" class="form-control">
                        <span class="text-danger">@error('password') {{ $message }}  @enderror</span>
                      </div>

                      <div>
                        <label for="rpass">Confirmpassword</label>
                        <input type="text" name="password_confirmation" id="rpass" placeholder="Reenter password" class="form-control">
                        <span class="text-danger">@error('password_confirmation') {{ $message }}  @enderror</span>
                      </div >

                     
                      <!-- <label for="">Photo</label>
                      <input type="file" name="photo" id="photo" class="form-control"> -->
                        
                      <input type="submit" value="Submit" name="submit" class="btn btn-success submit-btn form-control">
                  </form>
                </div>
               
              </div>
          </div>
  </body>
</html>
