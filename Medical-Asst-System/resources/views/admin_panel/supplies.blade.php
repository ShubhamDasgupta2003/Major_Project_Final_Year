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
   


   <table class='styled-table'>
                <thead>
        <tr>
          <!--  <th>Serial No</th> -->  
            <th>product Name</th>
            <th>Product Quanity</th>
        </tr>
    </thead>
    <tbody>

      @foreach($medical_supplies_medicals as $medical_supplies_medical)
        <tr>
           <!--   <td></td>-->
          
            <td>{{$medical_supplies_medical->product_name}}</td>
    
            <td>
            <form action="{{route('admin_panel.updatesupplies',['medical_supplies_medical' => $medical_supplies_medical])}}" method="post">
               @csrf
               @method('put')
                <input type="hidden" value="{{$medical_supplies_medical->id}}" name="id">
            <div class="quantity_box">
            <input type="number" min="0"  value="{{ $medical_supplies_medical->quantity }}" name="quantity">
             <input type="submit" class="update_quantity" value="update" name="update_product_quantity">
            </div>
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
         
           @endforeach 
               <td>
               <div class='table_bottom'>
                
                 <a href="{{route('admin_panel.admin_medical_supplies')}}" class='bottom_btn'><i class='fa-solid fa-hand-point-left fa-2xl'></i><h3>To the Previous Page</h3></a>
            </div>
              </td><td></td>  </tbody>
               </table>
            
            
                   
         
  
</div>

  <!-- '/Minor Project 5th_Sem/Emergency_Medical_Support_System/Medical Supplies/Medical Supplies.php' -->
</body>
</html>