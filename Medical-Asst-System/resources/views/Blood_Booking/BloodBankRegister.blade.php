<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Bank Registration</title>
    <link rel="stylesheet" href="D:\Major_Project_Final_Year\Medical-Asst-System\public\css\BloodBank\BBankregister.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-7">
              <div class="card shadow">
                
                <div class="card-header">
                   <div class="row "> <!--justify-content-center -->
                      <div class="col-md-9 "><h2>Blood Bank's Registration form </h2></div>   <!-- text-center -->
                      <div class="col-md-3"><a href="BloodBanks.php" class="btn btn-info">login</a></div>
                  </div>
                </div>
  
                <div class="card-body">
                  <form action="" method="post" enctype="multipart/form-data">
                      <label for="">Name</label>
                      <input type="text" name="name" placeholder="Enter your Blood bank name" class="form-control">
  
                      <label for="">Email</label>
                      <input type="email" name="email" placeholder="Enter email" class="form-control">
  
                      <label for="">Password</label>
                      <input type="password" name="pass" placeholder="Enter password" class="form-control">
  
                      <label for="">Latitude</label>
                      <input type="text" name="lat" placeholder="Enter your Latitude" class="form-control">
  
                      <label for="">Longitude</label>
                      <input type="text" name="lon" placeholder="Enter your Longitude" class="form-control">
  
                      <label for="">State</label>
                      <input type="text" readonly name="state" value="West Bengal" placeholder="Enter your state" class="form-control">
  
                      <label for="">City</label>
                      <input type="text" name="city" placeholder="Enter your city" class="form-control">
  
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
  
                      <!-- <label for="">Photo</label>
                      <input type="file" name="photo" id="photo" class="form-control"> -->
  
                      <input type="submit" value="Submit" name="submit" class="btn btn-success submit-btn form-control">
                  </form>
                </div>
               
              </div>
          </div>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

<style>
    .container{
    margin-top: 60px;
}
label{
    font-size: large;
    font-weight: bold;
    color: green;
}
.card-header{
    background-color: rgb(226, 243, 234);
}

.card-header{
    color: green;
    /* background-color: red; */
}

.submit-btn{
    margin-top:10px;
    border-radius: 5px;
    height: 50px;
    font-size: 1.5rem;
}
.btn-info{
    color:white;
}
.btn-info:hover{
    color:white;
    font-weight: bold;
}
.submit-btn:hover{
    /* background-color: rgb(108, 174, 139); */
    /* color: green; */
    font-weight: bold;
}
</style>