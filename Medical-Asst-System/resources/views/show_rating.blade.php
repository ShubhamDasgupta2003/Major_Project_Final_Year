<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Rating Dashbord</title>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  margin: 0 auto; /* Center website */
  max-width: 800px; /* Max width */
  padding: 20px;
}

.heading {
  font-size: 25px;
  margin-right: 25px;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */



#file {
  width: 100%; /* Adjust the width as needed */
  height: 20px; /* Adjust the height as needed */
  border-radius: 10px; /* Adjust the border radius as needed */
  background-color: #f0f0f0; /* Background color of the progress bar */
}

#file::-webkit-progress-bar {
  background-color: #f0f0f0; /* Background color of the progress bar container */
}
/* Individual bars */
.s5::-webkit-progress-value {
  background-color: #4caf50; /* Color of the progress bar */
  border-radius: 1px; /* Adjust the border radius as needed */
}

.s5::-moz-progress-bar {
  background-color: #4caf50; /* Color of the progress bar in Firefox */
}
.s4::-webkit-progress-value {
  background-color: #2196F3; /* Color of the progress bar */
  border-radius: 1px; /* Adjust the border radius as needed */
}

.s4::-moz-progress-bar {
  background-color: #2196F3; /* Color of the progress bar in Firefox */
}
.s3::-webkit-progress-value {
  background-color: #00bcd4; /* Color of the progress bar */
  border-radius: 1px; /* Adjust the border radius as needed */
}

.s3::-moz-progress-bar {
  background-color: #00bcd4; /* Color of the progress bar in Firefox */
}
.s2::-webkit-progress-value {
  background-color: #ff9800; /* Color of the progress bar */
  border-radius: 1px; /* Adjust the border radius as needed */
}

.s2::-moz-progress-bar {
  background-color: #ff9800; /* Color of the progress bar in Firefox */
}
.s1::-webkit-progress-value {
  background-color:  #f44336; /* Color of the progress bar */
  border-radius: 1px; /* Adjust the border radius as needed */
}

.s1::-moz-progress-bar {
  background-color: #f44336; /* Color of the progress bar in Firefox */
}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}
</style>
</head>
<body>
@php
$sum = 0;
$count =0;
$one=0;
$two=0;
$three=0;
$four=0;
$five=0;
@endphp
@foreach ( $ratings as $rating )
 @php
 if($rating->rating_value==1){
  $one=$one+1;
 }
 else if($rating->rating_value==2){
  $two+=1;
 }
 else if($rating->rating_value==3){
  $three+=1;
 }
 else if($rating->rating_value==4){
  $four+=1;
 }
 else if($rating->rating_value==5){
  $five+=1;
 }
 $sum = $sum+$rating->rating_value;
 $count =$count+1;
  @endphp
@endforeach
 @php
 if($count>0){
 $avg = $sum/$count;}
 else{
  $avg = 0;
 }
  @endphp
<span class="heading">User Rating</span>
<span class="fa fa-star @php if($avg>=1){
echo "checked";}@endphp"></span>
<span class="fa fa-star @php if($avg>=2){
echo "checked";}@endphp"></span>
<span class="fa fa-star @php if($avg>=3){
echo "checked";}@endphp"></span>
<span class="fa fa-star @php if($avg>=4){
echo "checked";}@endphp"></span>
<span class="fa fa-star @php if($avg>=5){
echo "checked";}@endphp"></span>
<p>{{$avg}} average based on {{$count}} reviews.</p>
<hr style="border:3px solid #f1f1f1">

<div class="row">
  <div class="side">
    <div>5 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <progress id="file" class="s5" max="100" value="@if($count>0){{{($five/$count)*100}}}@endif">70%</progress>
    </div>
  </div>
  <div class="side right">
    <div>{{$five}}</div>
  </div>
  <div class="side">
    <div>4 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-container">
      <progress id="file" max="100" class="s4" value="@if($count>0){{{($four/$count)*100}}}@endif">70%</progress>
    </div>
    </div>
  </div>
  <div class="side right">
    <div>{{$four}}</div>
  </div>
  <div class="side">
    <div>3 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <progress id="file" max="100" class="s3" value="@if($count>0){{{($three/$count)*100}}}@endif">70%</progress>
    </div>
  </div>
  <div class="side right">
    <div>{{$three}}</div>
  </div>
  <div class="side">
    <div>2 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <progress id="file" max="100" class="s2" value="@if($count>0){{{($two/$count)*100}}}@endif">70%</progress>
    </div>
  </div>
  <div class="side right">
    <div>{{$two}}</div>
  </div>
  <div class="side">
    <div>1 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <progress id="file" max="100" class="s1" value="@if($count>0){{{($one/$count)*100}}}@endif">70%</progress>
    </div>
  </div>
  <div class="side right">
    <div>{{$one}}</div>
  </div>
</div>
<br/>
<br/>
@php
$sum = 0;
@endphp
 @foreach ( $ratings as $rating )
 @php
 $sum = $sum+$rating->rating_value;
  @endphp
<div class="card w-100">
  <div class="card-body">
    <h5 class="card-title">{{$rating->user_name}} {{$rating->rating_value}}<span class="fa fa-star checked"></span></h5>
    <p class="card-text">{{$rating->rating_comment}}</p>
    {{-- <a href="#" class="btn btn-primary">Button</a> --}}
  </div>
</div>
<br/>
@endforeach
 @php
 $avg = $sum/4;
  @endphp


{{-- <div class="card w-100">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Button</a>
  </div>
</div> --}}

</body>
</html>