


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
        

    <link rel="stylesheet" href="{{asset('css/hcs_admin.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/useravatar.css')}}"> --}}
    <title>Healthcare Support Service Employee Admin</title>
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span><span>Index</span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                <a href="/show_emp_admin_intf"  style="text-decoration:none"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                 <a href="/hcs_emp_admin_ongoing_order" ><span class="las la-shopping-bag"></span>
                    <span>Ongoing Orders</span></a>
                </li>
                <li>
                 <a href="#" class="active"><span class="las la-shopping-bag"></span>
                    <span>All Orders</span></a>
                </li>
                <li>
                 <a href="/hcs_emp_admin_completed_orders" ><span class="las la-shopping-bag"></span>
                    <span>Completed Orders</span></a>
                </li>
            </ul>
        </div>
    </div>

   <div class="main-content">
    <header>
        <h3>
           <label for="nav-toggle">
             <span class="las la-bars"></span>
           </label>
           Dashboard
        </h3>
        <h3>
        </h3>
   <div class="user-avatar-container">
    <div class="user-avatar-dropdown">
        <a href="#" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar" style='font-size:25px;color:red'></i></a>
        <div class="dropdown-content">
            <a href="/hcs_emp_admin_logout"><i class='fas fa-sign-out-alt'></i>Logout</a>
        </div>
    </div>
    <br>
    @if (session()->has('emp_admin_name'))
       <h6 style="font-size:13px;">{{ session()->get('emp_admin_name') }}</h6>
    @else
        @php
            return redirect("/login");
        @endphp
    @endif
</div>
     
</header>
    <main>
<h2 class="text-center" style="color:#009879;" >All Orders</h2>
<table class="table table-striped-columns ">
  <thead>
  <tr  style="background-color:#009879;color:white;">
      <th scope="col">User Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Contact Number</th>
      <th scope="col">Land Mark</th>
      <th scope="col">Address</th>
      <th scope="col">District</th>
      <th scope="col">State</th>
      <th scope="col">Date & Time</th>
      <th scope="col">Status</th>
      </tr>
  </thead>
  <tbody>
  @foreach ( $orders as $order )
  @if(session()->get('emp_admin_id')== $order->emp_id)
    <tr>
      <td>{{$order->name}}</td>
      <td>{{$order->gender}}</td>
      <td>{{$order->contact_num}}</td>
      <td>{{$order->land_mark}}</td>
      <td>{{$order->address}}</td>
      <td>{{$order->district}}</td>
      <td>{{$order->state}}</td>
      <td>{{$order->created_at}}</td>
      <td>{{$order->order_status}}</td>
      <td class="d-none"></td>
      </tr>
    @endif
    @endforeach
  </tbody>
</table>
    </main>
   </div>
</body>
<script>
 function search() {
            var query = document.getElementById("searchInput").value.toLowerCase();
            var links = document.querySelectorAll("tr"); // Select all navigation links

            links.forEach(function(link) {
                var text = link.textContent.toLowerCase(); // Get text content of the link
                if (text.includes(query)) {
                    link.style.display = "block"; // Show the link if it matches the search query
                } else {
                    link.style.display = "none"; // Hide the link if it doesn't match the search query
                }
            });
        }
</script>
</html>