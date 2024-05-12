

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Ambulance Service Registration</title>
    <link rel="stylesheet" href="{{asset('css/amb_admin_reg.css')}}">
</head>
<body>
<section class="container"> 
      <div class="title-bar">
        
        <header>Update Table Form</header>
      </div>
      <form class="form" method="post" action="{{route('admin_panel.updated',['medical_supplies_medical'=>$medical_supplies_medical])}}"   enctype="multipart/form-data">
           @csrf
           @method('put')
        <div class="column">
          <div class="input-box">
            <label>Product Name <sub>(max 50 characters)</sub></label>
            <input name="product_name" type="text" placeholder="Enter Product Name" maxlength="50" value="{{$medical_supplies_medical->product_name}}" required/>
          </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>Product Rate</label>
            <input name="product_rate" type="number" placeholder="Enter Product Rate" maxlength="50" required/>
          </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>E-mail</label>
            <input name="email"  id="email" type="text" placeholder="Enter email id" maxlength="50" required/>
          </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Product Image </label>
                <input name="image" id="photo" type="file" placeholder="Enter Product Image" required />
            </div>

            <div class="input-box">
                <label>Table Name</label>
                <div class="select-box">
                    <select name="category" id="">
                        <option value="medical">medical</option>
                        <option value="technical">technical</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>Product ID</label>
            <input name="product_id" type="number" placeholder="Enter Product Id" value="{{$medical_supplies_medical->product_id}}" required/>
          </div>
          <div class="input-box">
            <label>Phone Number<sub>(without including +91)</sub</label>
            <input name="drvcont" id="drvcont" type="number" placeholder="Enter phone number" required maxlength="10"/>
          </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>File name</label>
                <input name="product_image" type="text" placeholder="Enter Source Id" required maxlength="10"/>
            </div>
        </div>
       
        <div class="column">
          <div class="input-box">
            <label>Product Info</label>
            <input name="product_para" type="text" placeholder="Enter Product Info "required minlength="136"  maxlength="136"/>
          </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>Product Description</label>
            <input name="product_desc" type="text" placeholder="Enter Product Description"  required/>
          </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>Product Makers</label>
            <input name="product_makers" type="text" placeholder="Enter Product Makers"required/>
          </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Password</label>
                <input id="pswd" type="password" placeholder="Enter your password" required />
            </div>
            <div class="input-box">
                <label>Confirm Password</label>
                <input id="cnf-pswd"type="text" placeholder="Confirm your password" name ="pswd" required />
            </div>
        </div>
        <button id="sbmt-form" name="submit" onclick="return confirm('Are you sure you want to insert this product');">Register</button>
      </form>
    </section>
    <script src="amb_admin_loc.js"></script>
    <!-- <script src="amb_adminReg_form.js"></script> -->
</body>
</html>