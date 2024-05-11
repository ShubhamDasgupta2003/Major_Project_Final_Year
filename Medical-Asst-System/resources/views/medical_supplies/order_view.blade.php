<?php
$s=0;
$p=0;
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
    foreach($orders as $order)
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
            <th>Order Date</th>
            <th>products Summary</th>
            <th>Products price</th>
            <th>Product Quanity</th>
    
            <th>Clear Order</th>
        </tr>
    </thead>
    <tbody>
       @foreach($orders as $order)
        <tr>
           <!--   <td></td>-->
            <td >{{$order->updated_at }}></td>
            <td>{{$order->product_name}}</td>
            <td>&#8377 {{$order->product_rate}}</td>
            <td>{{$order->product_quantity}}</td>
         
            <td>  <form method="post" action="{{route('order.delete',['order' => $order])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" class="update_quantity" value="clear" />
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
        
           @endforeach <td></td><td>
               </td>
               <td>
              
              </td>  <td></td><td></td></tbody>
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
    @foreach($orders as $order)
    <tbody>
        <tr>
            <td >{{$order->product_name}}</td>
            <td>
            <form action="{{route('cart.update',['cart' => $order])}}" method="post">
               @csrf
               @method('put')
                <input type="hidden" value="{{$order->id}}" name="id">
            <div class="quantity_box">
             <input type="number" min="1" value="{{$order->product_quantity}}" name="product_quantity">
             <input type="submit" class="update_quantity" value="update" name="update_product_quantity">
            </div>
            </form>
            </td>
            <td>&#8377 &#8377 {{$order->product_rate*$order->product_quantity}}</td>
            <td>  <form method="post" action="{{route('order.delete',['order' => $order])}}">
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
               <h3 class='bottom_btn'>Grand Total :&#8377 {{$order->product_rate*$order->product_quantity}}<h3>
               @endforeach    
               <a href='order confirmation.php?pgt=$grand_total' class='bottom_btn'>Proceed To Checkout</a>
               </div></td> <td></td><td></td> </tbody>
               </table>  
    
</div>
  

  <!-- '/Minor Project 5th_Sem/Emergency_Medical_Support_System/Medical Supplies/Medical Supplies.php' -->
</body>
</html>