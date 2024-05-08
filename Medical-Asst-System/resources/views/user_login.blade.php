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
        @if(session()->has('alertMessage'))
        <div class="alert alert-{{ session('alertType') }}" style="color:red ;text-align:center;" role="alert">
        {{ session('alertMessage') }}
        </div>
        @endif
           @if (Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if (Session::has('failed'))
                <div class="alert alert-danger">{{Session::get('failed')}}</div>
            @endif
        <div class="column">
            <div class="input-box">
                <label>Email/Number</label>
                <input id="email" type="text" name="email" placeholder="Enter your email or number" required value="{{old('email')}}" />
            </div>
            <div class="input-box">
                <label>Password</label>
                <input id="pswd"type="password" name="password" placeholder="Enter your password" required />
            </div>
        </div>
        <button name="login" id="sbmt-form"><i class="fa-solid fa-user"></i>&nbsp&nbspUser login</button>
        <div class="signuplink">
          <div class="text">New user?</div>
          <a href="">click here</a>
        </div>
        
        <div class="signuplink">
        <a href="{{route('display.login')}}" class="btn-danger"><i class="fa-solid fa-user-gear"></i>&nbsp&nbspAdmin Login</a>
        </div>
      </form>
    </section>
  </body>
</html>

<style>

  
</style>