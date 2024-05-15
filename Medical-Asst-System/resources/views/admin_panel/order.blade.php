<?php
$s=0;
$p=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin order</title>
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
             window.location.href = "{{route('admin_panel.admin_medical_supplies')}}";
        </script><?php

    }
    ?>


   <table class='styled-table'>
                <thead>
        <tr>
          <!--  <th>Serial No</th> -->
            <th>Order Date</th>
            <th>Userid</th>
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
            <td >{{$order->user_id }}></td>
            <td>{{$order->product_name}}</td>
            <td>&#8377 {{$order->product_rate}}</td>
            <td>{{$order->product_quantity}}</td>
         
            <td>  <form method="post" action="{{route('admin_order.delete',['order' => $order])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" class="update_quantity" onclick="return confirm('Are you sure you want to delete this product');" value="cancel" />
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
              
              </td>  <td></td><td></td><td></td></tbody>
               </table>
            
                   
         
  
</div>


  

  <!-- '/Minor Project 5th_Sem/Emergency_Medical_Support_System/Medical Supplies/Medical Supplies.php' -->
</body>
</html>