@extends("hcs_template")

@section("title")
Aya
@endsection
@section("main")
<!-- header section end -->        
    <section class="body-container">
        <div>
            <nav class="segmented-navigation">
                <a href="/aya" class="segmented-item active">Aya</a>
                <a href="/nurse" class="segmented-item">Nurse</a>
                <a href="/technician" class="segmented-item">Technician</a>
              </nav>
        </div>
        <br/>
        <div class="openModalBtn"><button id="openModalBtn">Order History</button></div>

    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <table id="myTable">
              <thead>
                  <tr>
                      <th scope="col">Order Id</th>
                      <th scope="col">Order For</th>
                      <th scope="col">Order Date & Time</th>
                      <th scope="col">Order Status</th>
                      <th scope="col">Add Review</th>
                  </tr>
              </thead>
              <tbody>
               @foreach ( $userdatas as $userdata )
                  <tr>
                      <td>{{$userdata->order_id}}</td>
                      <td>@if($userdata->order_type=="A")
                {{"Aya"}}
                
                @elseif($userdata->order_type=="N")
                    {{"Nurse"}}
               
                @else
                    {{"Technician"}}
                
                @endif</td>
                      <td>{{$userdata->created_at}}</td>
                      <td>{{$userdata->order_status}}</td>
                      <td><a href="{{route('hcs_add_rating', ['emp_id' => $userdata->emp_id ])}}"><button type="button" class="btn btn-primary">Add review</button></a></td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
    </div>
        <div class="contents">
            
            <!-- Your content goes here | check body_cont.css file for css property-->
            <div class="cards">
            @foreach ( $employess as $employee )
                @if ($employee->emp_type=="A")
                <div class='card'> 
                <div class='card-part1'> <img
                src="{{ asset('storage/' . $employee->emp_photo_path) }}"
                /></div>
                <div class='card-part2'>
                <strong>{{$employee->emp_name}}</strong><br/>
                <strong>@if($employee->emp_gender=="M")
                {{"Male"}}
                
                @elseif($employee->emp_gender=="F")
                    {{"Female"}}
               
                @else
                    {{"Others"}}
                
                @endif</strong>
                <a href="{{route('hcs_show_rating', ['emp_id' => $employee->emp_id ])}}"><div>4.4<span class="fa fa-star checked"></span>
                </div></a>
                <strong><span style='color: red;'>INR {{$employee->emp_salary}}  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href="{{route('registration', ['emp_id' => $employee->emp_id ])}}"><button class='btn btn-secondary-orange'>&nbsp;&nbsp;Book&nbsp;&nbsp;</button></a>
                </div> 
                </div> 
           @endif
        @endforeach
            </div>
        </div>
@endsection

@section("js")<script>
let menu=document.querySelector('#menu-btn');
let navbar=document.querySelector('.navbar');

menu.onclick=()=>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

window.onscroll=()=>{
    menu.classList.remove('fa-times');
    menu.classList.remove('active');
}
// Get the modal element
var modal = document.getElementById("modal");

// Get the button that opens the modal
var btn = document.getElementById("openModalBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>
<script>
        function search() {
            var query = document.getElementById("searchInput").value.toLowerCase();
            var links = document.querySelectorAll(".card"); // Select all navigation links

            links.forEach(function(link) {
                var text = link.textContent.toLowerCase(); // Get text content of the link
                if (text.includes(query)) {
                    link.style.display = "block"; // Show the link if it matches the search query
                } else {
                    link.style.display = "none"; // Hide the link if it doesn't match the search query
                }
            });
        }
         function search1() {
            var query = document.getElementById("searchInput1").value.toLowerCase();
            var links = document.querySelectorAll(".card"); // Select all navigation links

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
@endsection
