<?php
$s=0;
$p=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$tittle}}</title>
</head>
<body>
     <div class="main">
  
     <p><h2>Receipt </h2></p>
  <p>From</p>
  <p>Emergency Medical Assistance System</p>
  <p>emergencymedicalservices23@gmail.com</p>
  <p><u>Bill To</u></p>
  <p>{{$username}}</p>
  <p>{{$date}}</p>
  <p>Hello {{$username}} ,  Thank you for your recent purchase. We are honored to gain you as a customer and hope to serve you for a long time.Here is your receipt of your order</p>';
  <table class='styled-table'>
               <thead>
       <tr>
         <!--  <th>Serial No</th> -->
           <th>Product Name</th>
           <th>Product price</th>
           <th>Product Quanity</th>
           <th>Total Price</th>
         
       </tr>
   </thead>
   <tbody>
 
     @foreach($carts as $cart)
       <tr>
          <!--   <td></td>-->
         
           <td>{{$cart->product_name}}</td>
           <td>{{$cart->product_rate}} /-</td>
           <td>{{ $cart->product_quantity }}</td>
           <td>{{$cart->product_rate*$cart->product_quantity}} /-</td>
          
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
           
              <h3 class='bottom_btn'>Grand Total : <?php echo $p ?>/- <h3>
        
 
  </div>
  <u>Grand Total</u>   <?php echo $p ?>/-
  <p>So the total bill is  <?php echo $p ?>/-  Any problem Contact us with your registered email which is {{$useremail}}</p>
  <p><h4>Terms and Conditions</h4></p>
  <p>*The items mentioned above payment has been paid by the customer </p>';
  <p>*The service has received the customers full payment</p>';

</body>
</html>