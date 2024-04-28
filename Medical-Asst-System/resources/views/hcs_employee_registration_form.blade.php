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
                <input type="text" class="input" name="emp_name" required>
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
                <input type="email" class="input" name="emp_email" required>
            </div>
            <div class="input_field">
                <label>Contact Number:</label>
                <input type="text" class="input" name="emp_contact_num" required>
            </div>
            <div class="input_field">
                <label>Any Govt Id Prove Number</label>
                <input type="number" class="input" name="emp_govt_id" required>
            </div>
            <div class="input_field">
                <label>Salary</label>
                <input type="number" class="input" name="emp_salary" required>
            </div>
            <div class="input_field">
                <label>Upload Your Image</label>
                <input type="file" class="input" name="photo" required>
            </div>
            <div class="input_field">
                <label>Upload The copy of Govt Issued Id which you provide</label>
                <input type="file" class="input" name="govt_id_copy" required>
            </div>
            <div class="input_field">
                <label>Upload BIO Data</label>
                <input type="file" class="input" name="bio_data" required>
            </div>
            <div class="input_field">
                <input type="submit"  value="Register" class="btn" name="register">
            </div>
        </form>
        </div>
    </div>
</body>
</html>
