<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Star Rating</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  place-items: center;
  text-align: center;
  background:#F3FFFD;
}
.container{
  position: relative;
  width: 400px;
  background: #111;
  padding: 20px 30px;
  border: 1px solid #444;
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}
.container .post{
  display: none;
}
.container .text{
  font-size: 25px;
  color: #666;
  font-weight: 500;
}
.container .edit{
  position: absolute;
  right: 10px;
  top: 5px;
  font-size: 16px;
  color: #666;
  font-weight: 500;
  cursor: pointer;
}
.container .edit:hover{
  text-decoration: underline;
}
.container .star-widget input{
  display: none;
}
.star-widget label{
  font-size: 40px;
  color: #444;
  padding: 10px;
  float: right;
  transition: all 0.2s ease;
}
input:not(:checked) ~ label:hover,
input:not(:checked) ~ label:hover ~ label{
  color: #fd4;
}
input:checked ~ label{
  color: #fd4;
}
input#rate-5:checked ~ label{
  color: #fe7;
  text-shadow: 0 0 20px #952;
}
#rate-1:checked ~ .form header:before{
  content: "I just hate it ";
}
#rate-2:checked ~ .form header:before{
  content: "I don't like it ";
}
#rate-3:checked ~ .form header:before{
  content: "It is awesome ";
}
#rate-4:checked ~ .form header:before{
  content: "I just like it ";
}
#rate-5:checked ~ .form header:before{
  content: "I just love it ";
}
.container .form{
  display: none;
}
input:checked ~ .form{
  display: block;
}
.form header{
  width: 100%;
  font-size: 25px;
  color: #fe7;
  font-weight: 500;
  margin: 5px 0 20px 0;
  text-align: center;
  transition: all 0.2s ease;
}
.form .textarea{
  height: 100px;
  width: 100%;
  overflow: hidden;
}
.form .textarea textarea{
  height: 100%;
  width: 100%;
  outline: none;
  color: #eee;
  border: 1px solid #333;
  background: #222;
  padding: 10px;
  font-size: 17px;
  resize: none;
}
.textarea textarea:focus{
  border-color: #444;
}
.form .btn{
  height: 45px;
  width: 100%;
  margin: 15px 0;
  color:#00A896 ;
  background-color: #00A896;
}
.form .btn button{
  height: 100%;
  width: 100%;
  border:none;
  outline: none;
  background: #00A896;
  color: #fff;
  font-size: 17px;
  font-weight: 500;
  text-trans.form: uppercase;
  cursor: pointer;
  transition: all 0.3s ease;
}
.form .btn button:hover{
    background:#fff;
  color:  #00A896;
  border: 1px solid  #00A896;
}
    </style>
  </head>
  <body>
   @php
    $emp_id = request('emp_id');
    @endphp
    <div class="container">
      <div class="post">
        <div class="text">Thanks for rating us!</div>
        <div class="edit">EDIT</div>
      </div>
      <form action="#" method="post">
      <input type="hidden" name="emp_id" value="{{request()->input('emp_id')}}">
      <div class="star-widget">
        <input type="radio" name="rate" id="rate-5" value="5">
        <label for="rate-5" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-4" value="4">
        <label for="rate-4" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-3" value="3">
        <label for="rate-3" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-2" value="2">
        <label for="rate-2" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-1" value="1">
        <label for="rate-1" class="fas fa-star"></label>
        <div class="form">
        @csrf
          <header></header>
          <div class="textarea">
            <textarea cols="30" placeholder="Describe your experience.." name="rating_comment"></textarea>
          </div>
          <div class="btn">
            <button type="submit">Post</button>
          </div>
          </div>
        </form>
      </div>
    </div>
    <script>
    </script>

  </body>
</html>