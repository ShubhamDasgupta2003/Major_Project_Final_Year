<?php
$s=0;
$p=1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/Medical Supplies/navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/Medical Supplies/cart.css')}}">
   

</head>
<body>
 <div class="main">
    <?php
    foreach($carts as $cart)
    {
    $s=$s+1;
    }
    if ($s==0)
    {
        
       ?> <script>alert("no products present in cart");
             window.location.href = "{{route('medical_supplies.index')}}";
        </script><?php

    }
    ?>


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
       @foreach($carts as $cart)
        <tr>
           <!--   <td></td>-->
            <td ><img src="{{asset('pictures/'.$cart->product_image)}}" ></td>
            <td>{{$cart->product_name}}</td>
            <td>&#8377 {{$cart->product_rate}}</td>
            <td>
            <form action="{{route('cart.update',['cart' => $cart])}}" method="post">
               @csrf
               @method('put')
                <input type="hidden" value="{{$cart->id}}" name="id">
            <div class="quantity_box">
             <input type="number" min="1" value="{{$cart->product_quantity}}" name="product_quantity">
             <input type="submit" class="update_quantity" value="update" name="update_product_quantity">
            </div>
            </form>
            </td>
            <td>&#8377 {{$cart->product_rate*$cart->product_quantity}}</td>
            <td>  <form method="post" action="{{route('cart.delete',['cart' => $cart])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" class="update_quantity" value="Delete" />
                    </form>
            </td>
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
               <div class='table_bottom'>
                 <a href="{{route('medical_supplies.index')}}" class='bottom_btn'><i class='fa-solid fa-hand-point-left fa-2xl'></i><h3>To the Previous Page</h3></a>
                <h3 class='bottom_btn'>Grand Total :&#8377 <?php echo $p ?> <h3>
                <a href="{{route('medical_supplies.order_confirmation')}}" class='bottom_btn'> <i class='fa-solid fa-hand-point-right fa-2xl'></i>Proceed To Checkout</a>
            </div>
               <div class="fileinput">
          
                     <form method="post" enctype="multipart/form-data" action="{{route('medical_supplies.imagestore')}}">
                       @csrf
                        <label for="file"><h3 style="color:#009879;">Prescription Upload</h3></label>
                       <input name="image" id="file" type="file" hidden/>
                        <button  type="submit" style="background-color: #009879;border-radius: 25px;color:white;font-family: 'Poppins',sans-serif;text-transform:capitalize;transition:all .2s ease-out;text-decoration: none;">Upload</button>
                     </form>
                 
               </div>
              </td>  <td></td><td></td><td></td></tbody>
               </table>
            
                   
         
  
</div>

<div class="sub">
<table class='styled-table' style='width:60%'>
                <thead>
        <tr>
            <th style='width:20%'>product Name</th>
            <th style='width:20%'>Product Quanity</th>
            <th style='width:5%'>Total Price</th>
            <th style='width:5%'>Delete Item</th>
        </tr>
    </thead>
    @foreach($carts as $cart)
    <tbody>
        <tr>
            <td >{{$cart->product_name}}</td>
            <td>
            <form action="{{route('cart.update',['cart' => $cart])}}" method="post">
               @csrf
               @method('put')
                <input type="hidden" value="{{$cart->id}}" name="id">
            <div class="quantity_box">
             <input type="number" min="1" value="{{$cart->product_quantity}}" name="product_quantity">
             <input type="submit" class="update_quantity" value="update" name="update_product_quantity">
            </div>
            </form>
            </td>
            <td>&#8377 &#8377 {{$cart->product_rate*$cart->product_quantity}}</td>
            <td>  <form method="post" action="{{route('cart.delete',['cart' => $cart])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" class="update_quantity" value="Delete" />
                    </form>
            </td>
        </tr>
       
           <!-- <script>alert("no products present in cart");
             window.location.href = '/Minor Project 5th_Sem/Emergency_Medical_Support_System/Medical Supplies/Medical Supplies.php'
             </script> -->
          
             <td></td><td>
               <div class='table_bottom'>
               <h3 class='bottom_btn'>Grand Total :&#8377 {{$cart->product_rate*$cart->product_quantity}}<h3>
               @endforeach    
               <a href='order confirmation.php?pgt=$grand_total' class='bottom_btn'>Proceed To Checkout</a>
               </div></td> <td></td><td></td> </tbody>
               </table>  
    
</div>
  

  <!-- '/Minor Project 5th_Sem/Emergency_Medical_Support_System/Medical Supplies/Medical Supplies.php' -->
</body>
</html>