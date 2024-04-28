<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css//BloodBank/login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
  
  </head>
  <body>
    <section class="container">
      <div class="title-bar">
        <header>Login</header>
      </div>
      <form method="post" class="form">
        @csrf
           @if (Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if (Session::has('failed'))
                <div class="alert alert-danger" style="color:red;">{{Session::get('failed')}}</div>
            @endif
        <div class="column">
            <div class="input-box">
                <label>Email</label>
                <input id="email" type="text" name="admin_email" placeholder="Enter your email or number" required value="{{old('email')}}" />
            </div>
            <div class="input-box">
                <label>Password</label>
                <input id="paswd"type="password" name="admin_password" placeholder="Enter your password" required />
            </div>
        </div>
        <button name="submit" type="submit" id="sbmt-form">LOGIN</button>
        </div>
      </form>
    </section>
  </body>
</html>

<style>

  
</style>