


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
        

    <link rel="stylesheet" href="{{asset('css/adminb.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('css/useravatar.css')}}"> --}}
    <title>HCS Admin</title>
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
                <a href="#" class="active"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                {{-- <a href="{{route('admin_panel.admin_medical_supplies')}}"><span class="las la-shopping-bag"></span>
                    <span>Medical Supplies</span></a>
                </li>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/ambulance Srvc admin/amb_srvc_admin.php" ><span class="las la-ambulance"></span>
                    <span>Ambulance Service</span></a>
                </li>
                <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/Blood_Bank/adminb.php" ><i class="fa-solid fa-building-columns"></i></span>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/Blood_Bank/adminb.php"> <span class="las la-landmark"></span>
                    <span>Blood Bannk Service</span></a>
                </li>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/bed_booking_admin.php" ><span class="las la-hospital"></span>
                    <span>Bed Booking Service</span></a>
                </li>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/MedTechSupport/medtech_admin.php" ><span class="las la-hospital"></span>
                    <span>Aya/Nurse/Medical Technician</span></a>
                </li> --}}
              <!--  <li>
                    <a href=""><span class="las la-clipboard-list"></span>
                    <span>Projects</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-shopping-bag"></span>
                    <span>Orders</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-circle"></span>
                    <span>Inventory</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-circle"></span>
                    <span>Accounts</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-clipboard-list"></span>
                    <span>Inventory</span></a>
                </li>  -->
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
        <h6>
    <div class="user-avatar-container">
    <a href="" id="user-avatar"><i class="fa-solid fa-user fa-lg account-avatar"style='font-size:15px;color:red'>  </i></a>@if (session()->has('hcs_admin_name'))
               {{session()->get('hcs_admin_name')}}
            @else
            @php
            return redirect("hcs_admin_login");
            @endphp
            @endif
           <a href="/hcs_admin_logout" id="user-avatar"><i class='fas fa-sign-out-alt' style='font-size:15px;color:red'></i></a>
    </div>
   
    </h6>
     
    </header>
    <main>
        <div class="cards">
            <div class="card-single">
                <div>
                  
                    <h1 style="color: #fff;"></h1>
                    <span>Customers</span>
                </div>
                <div>
                    <span class="las la-users" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    
                    <h1 style="color: #fff;"></h1>
                    <span>orders</span>
                </div>
                <div>
                    <span class="las la-shopping-bag" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h1 style="color: #fff;"> &#8377 </h1>
                    <span>Income(Current Month)</span>
                </div>
                <div>
                   <span class="lab la-google-wallet" ></span>  
                </div>
            </div>
        </div><br/>
        <br/>

<h2 class="text-center" >Employee Requests</h2>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Emp Id</th>
      <th scope="col">Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Type</th>
      <th scope="col">Email</th>
      <th scope="col">Number</th>
      <th scope="col">Salary</th>
      <th scope="col">Address</th>
      <th scope="col">Govt Id</th>
      <th scope="col">Photo</th>
      <th scope="col">Govt Id</th>
      <th scope="col">BIO data</th>
      <th scope="col">Approve</th>
      <th scope="col">Reject</th>
    </tr>
  </thead>
  <tbody>
  @foreach ( $employess as $employee )
    <tr>
      <td>{{$employee->emp_id}}</td>
      <td>{{$employee->emp_name}}</td>
      <td>{{$employee->emp_gender}}</td>
      <td>{{$employee->emp_type}}</td>
      <td>{{$employee->emp_email}}</td>
      <td>{{$employee->emp_contact_num}}</td>
      <td>{{$employee->emp_salary}}</td>
      <td>{{$employee->emp_address}}</td>
      <td>{{$employee->emp_govt_id}}</td>
      <td><a href="{{ asset('storage/' . $employee->emp_photo_path) }}" style="text-decoration:none;">Click</a></td>
      <td><a href="{{ asset('storage/' . $employee->emp_govt_id_path)}}"style="text-decoration:none;">Click</a></td>
      <td><a href="{{ asset('storage/' . $employee->emp_bio_data_path)}}"style="text-decoration:none;">Click</a></td>
      <td> <a href="{{route('hcs_admin',['emp_id' => $employee->emp_id ])}}" id="addBtn"><button type="button" class="btn btn-primary">Add</button></a></td>
      <td> <a href="{{route('hcs_admin',['emp_id' => $employee->emp_id ])}}" id="deleteBtn"><button type="button" class="btn btn-danger">Delete</button></a><td>
    </tr>
    @endforeach
  </tbody>
</table>
    </main>
   </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
   $(document).ready(function() {
    $('#addBtn').click(function(event) {
        // Prevent the default behavior of the anchor tag
        event.preventDefault();

        // Show alert to the user
        alert("Are you sure you want to perform this action?");

        // Get emp_id from the href attribute of the anchor tag
        var emp_id = $(this).attr('href').split('=')[1];

        // Send Ajax request
        $.ajax({
            url: "{{ route('hcs_emp_verification') }}",
            method: 'GET',
            data: {
                _token: '{{ csrf_token() }}',
                emp_id: emp_id
            },
            success: function(response) {
                // Handle success response

                // Redirect user after successful completion of Ajax request
                window.location.href = "/hcs_emp_verification";
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
                alert("Error occurred while processing your request.");
            }
        });
    });
     $('#deleteBtn').click(function(event) {
        // Prevent the default behavior of the anchor tag
        event.preventDefault();

        // Show alert to the user
        alert("Are you sure you want to perform this action?");

        // Get emp_id from the href attribute of the anchor tag
        var emp_id = $(this).attr('href').split('=')[1];

        // Send Ajax request
        $.ajax({
            url: "{{ route('hcs_emp_delete') }}",
            method: 'GET',
            data: {
                _token: '{{ csrf_token() }}',
                emp_id: emp_id
            },
            success: function(response) {
                // Handle success response

                // Redirect user after successful completion of Ajax request
                window.location.href = "/hcs_emp_delete";
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
                alert("Error occurred while processing your request.");
            }
        });
    });
});

</script>

</body>
</html>