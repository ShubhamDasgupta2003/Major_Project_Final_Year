<?php
$s=0;
$p=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/Medical Supplies/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/Medical Supplies/cart.css')}}">
   

</head>
<body>
<h2>{{$date}}</h2>

 <div class="main">
  

   <table class='styled-table'>
                <thead>
        <tr>
          <!--  <th>Serial No</th> -->
            <th>Product Image</th>
            <th>product Name</th>
            <th>Product price</th>
            <th>Product Quanity</th>
            <th>Total Price</th>
            <th>Delete Item</th>
        </tr>
    </thead>
    <tbody>
    @php
    $joinedData = DB::table('carts')
        ->join('medical_supplies_medicals', 'carts.product_name', '=', 'medical_supplies_medicals.product_name')
        ->select('medical_supplies_medicals.quantity')
        ->get();
 
@endphp
      @foreach($carts as $index => $cart)
        <tr>
           <!--   <td></td>-->
            <td ><img src="{{asset('pictures/'.$cart->product_image)}}" ></td>
            <td>{{$cart->product_name}}</td>
            <td>&#8377 {{$cart->product_rate}}</td>
            <td><input type="hidden" value="{{$cart->id}}" name="id">
            <input type="number" min="1" max="{{ max(1, $joinedData[$index]->quantity) }}" value="{{ $cart->product_quantity }}" name="product_quantity">
             <input type="submit" class="update_quantity" value="update" name="update_product_quantity">
            </td>
            <td>&#8377 {{$cart->product_rate*$cart->product_quantity}}</td>
            <td> <input type="submit" class="update_quantity" value="Delete" /></td>
           <!-- <td>
                <a href="delete.php?delete=" onclick="return confirm('Are you sure you want to delete this product');"><i class="fa-solid fa-trash" id="delete">  Remove</i></a>
            </td> -->
        </tr>
       
           <!-- <script>alert("no products present in cart");
             window.location.href = '/Minor Project 5th_Sem/Emergency_Medical_Support_System/Medical Supplies/Medical Supplies.php'
             </script>
          <td></td>
           -->
           <?php
          
           $p=$p+($cart->product_rate*$cart->product_quantity);
           ?>
           @endforeach <td></td><td>
               </td>
               <td>
              </td>  <td></td><td></td><td></td></tbody>
               </table>
            
                   
         
  
</div>


  <!-- '/Minor Project 5th_Sem/Emergency_Medical_Support_System/Medical Supplies/Medical Supplies.php' -->
</body>
</html>