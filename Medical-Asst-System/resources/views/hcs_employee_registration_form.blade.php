<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration Form</title>
    <link rel="stylesheet" href="css/register_form.css">
</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="title">
            Employee Registration Form
        </div>
        <div class="form">
            <div class="input_field">
                <label>Employee Full Name:</label>
                <input type="text" class="input" name="emp_name">
            </div>
            <div class="input_field">
                <label>Gender:</label>
                <div class="selectbox">
                    <select name="emp_gender">
                        <option>Select</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Others</option>
                    </select>
                </div>
            </div>
            <div class="input_field">
                <label>Date of Birth:</label>
                <input type="date" class="input" name="emp_dob">
            </div>
            <div class="input_field">
                <label>Employee Type:</label>
                <div class="selectbox">
                    <select name="emp_type">
                        <option>Select</option>
                        <option value="A">Aya</option>
                        <option value="N">Nurse</option>
                        <option value="T">Technician</option>
                    </select>
                </div>
            </div>
            <div class="input_field">
                <label>Email:</label>
                <input type="email" class="input" name="emp_email">
            </div>
            <div class="input_field">
                <label>Password:</label>
                <input type="password" class="input" name="password">
            </div>
            <div class="input_field">
                <label>Contact Number:</label>
                <input type="text" class="input" name="emp_contact_num">
            </div>
            <div class="input_field">
                <label>Full Address:</label>
                <textarea type="text" class="input" name="emp_address">
                </textarea>
                <input id="lat" type="hidden" class="input" name="emp_loc_lat" value="">
                <input id="long" type="hidden" class="input" name="emp_loc_long" value="">
            </div>
            <div class="input_field">
                <label>Any Govt Id Prove Number</label>
                <input type="number" class="input" name="emp_govt_id">
            </div>
            <div class="input_field">
                <label>Salary</label>
                <input type="number" class="input" name="emp_salary">
            </div>
            <div class="input_field">
                <label>Upload Your Image</label>
                <input type="file" class="input" name="photo">
            </div>
            <div class="input_field">
                <label>Upload The copy of Govt Issued Id which you provide</label>
                <input type="file" class="input" name="govt_id_copy">
            </div>
            <div class="input_field">
                <label>Upload BIO Data</label>
                <input type="file" class="input" name="bio_data">
            </div>
            <div class="input_field">
                <input type="submit"  value="Register" class="btn" name="register">
            </div>
        </form>
        </div>
    </div>
 <script>
    let latView = document.getElementById('lat');
    let longView = document.getElementById('long');

    function onSuccess(position)
    {
        let {latitude,longitude} = position.coords;
        console.log(latitude,longitude);
        latView.value = latitude;
        longView.value = longitude;
        document.cookie = "lat_in_use= "+latitude;
        document.cookie = "lon_in_use= "+longitude;
        {{-- fetch('https://api.opencagedata.com/geocode/v1/json?q='+latitude+','+longitude+'&key='+api_key)
        .then(response=>(response.json())).then(result=>{
            let details = result.results[0];
            let loc_txt = details['formatted'];
            document.cookie = "address_in_use= "+loc_txt;
            document.cookie = "loc_modify= "+true;
            window.location.reload();
        }) --}}
    }

    function onError(error)
    {
        console.log(error);
    }

        if(navigator.geolocation)
        {
            navigator.geolocation.getCurrentPosition(onSuccess,onError);
        }
        else
        {
            btn_loc.innerText = "Geoloaction not supported";
        }

    </script>
</body>
</html>
