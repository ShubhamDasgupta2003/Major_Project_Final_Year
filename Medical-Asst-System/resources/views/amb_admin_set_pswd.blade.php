<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center" style="height:100vh">
 
        <div class="card" style="width: 25rem;">
    <div class="card-body">
        <h5 class="card-title">Create your password</h5>

        <form action="{{url('/')}}/amb-admin-set-pswd" method="post">
        @csrf
        <label for="inputPassword5" class="form-label mt-3">Ambulance No</label>
        <input type="email" id="inputPassword5" name="amb_no" class="form-control" value="{{$data['amb_no']}}" readonly>

        <label for="inputPassword5" class="form-label mt-3">Email</label>
        <input type="email" id="inputPassword5" name="amb_drv_email_reg" class="form-control" value="{{$data['email']}}" readonly>

        <label for="inputPassword5" class="form-label mt-3">Mobile</label>
        <input type="tel" id="inputPassword5" name="amb_drv_contact_reg" class="form-control" value="{{$data['mob']}}" readonly>

        <label for="inputPassword5" class="form-label mt-3">New Password</label>
        <input type="password" id="inputPassword5" name="amb_password_reg" class="form-control" aria-describedby="passwordHelpBlock">

        <label for="inputPassword5" class="form-label mt-3">Confirm new Password</label>
        <input type="password" id="inputPassword5" name="amb_cnfm_password_reg" class="form-control">

        <div id="passwordHelpBlock" class="form-text">
        Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
        </div>
        <button type="submit" class="btn btn-success mt-5">Create Password</button>
        </form>
    </div>
</div>
    </div>
    
</body>
</html>