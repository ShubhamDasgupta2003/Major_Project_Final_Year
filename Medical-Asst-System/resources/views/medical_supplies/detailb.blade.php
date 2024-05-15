
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
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
        
            
        </script>
    </div>
@endif
  <div class="container">
    <div class="card">
        <img src="{{asset('pictures/'.$medical_supplies_technical->product_image)}}" alt="">
        <div class="column">
            <div class="amb_info_cont">
                <h1 class="descp" id="title">{{$medical_supplies_technical->product_name}}</h1>
                <p class="descp" id="card-type"{{$medical_supplies_technical->product_makers}}></p>
                

            </div>
            <div class="patient_info_cont">

                <form action="{{route('technical_supplies.storeb')}}" method="post">
                     @csrf
                     @method('post')
                  <p class="descp" id="card-type"> {{$medical_supplies_technical->product_para}}
                    <h2 class="descp" id="card-fare">&#8377 {{$medical_supplies_technical->product_rate}}</h2>
                    <input type="hidden" name="product_name" value="{{$medical_supplies_technical->product_name}}">
                    <input type="hidden" name="product_rate" value="{{$medical_supplies_technical->product_rate}}">
                    <input type="hidden" name="product_image"  value="{{$medical_supplies_technical->product_image}}">
                    <input type="hidden" name="product_quantity" value="1">
                    <input type="hidden" name="user_id" value="{{session()->get('user_id')}}">
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
                            
              {{$medical_supplies_technical->product_desc}}




              
         </pre>
        
  </div>
</div>
</body>
</html>
