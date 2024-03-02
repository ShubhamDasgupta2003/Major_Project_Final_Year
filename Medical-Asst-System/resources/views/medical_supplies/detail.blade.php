
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

</html>
<link rel="stylesheet" href="{{asset('css/Medical Supplies/detailed product2.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="{{asset('css/Medical Supplies/navbar.css')}}">
<link rel="stylesheet" href="{{asset('css/Medical Supplies/amb_form_booking.css')}}">
<link rel="stylesheet" href="{{asset('css/Medical Supplies/navlink.css')}}">
</head>
<body>

  <div class="container">
    <div class="card">
        <img src="{{asset('pictures/'.$medical_supplies_medical->product_image)}}" alt="">
        <div class="column">
            <div class="amb_info_cont">
                <h1 class="descp" id="title">{{$medical_supplies_medical->product_name}}</h1>
                <p class="descp" id="card-type"{{$medical_supplies_medical->product_makers}}></p>
                

            </div>
            <div class="patient_info_cont">

                <form action="{{route('medical_supplies.store')}}" method="post">
                     @csrf
                     @method('post')
                  <p class="descp" id="card-type"> {{$medical_supplies_medical->product_para}}
                    <h2 class="descp" id="card-fare">&#8377 {{$medical_supplies_medical->product_rate}}</h2>
                    <input type="hidden" name="product_name" value="{{$medical_supplies_medical->product_name}}">
                    <input type="hidden" name="product_rate" value="{{$medical_supplies_medical->product_rate}}">
                    <input type="hidden" name="product_image"  value="{{$medical_supplies_medical->product_image}}">
                    <input type="hidden" name="product_quantity" value="1">
                    <input type="hidden" name="user_id" value="1">
                    <input type="submit" class="btn" value="Add To Cart" name="add_to_cart"></input>
                </form>
             <!--   <a href="order confirmation.html">   </a>  -->
            </div>
        </div>     
    </div>
</div>


<div class='detail'>
  <div class="content">
         <pre>


              <b>PRODUCT DETAILS</b>
                            
              {{$medical_supplies_medical->product_desc}}





         </pre>
        
  </div>
</div>
</body>
</html>
