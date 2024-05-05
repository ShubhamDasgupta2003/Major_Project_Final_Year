@extends("healthcare_support_template")

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
        </br>
        <div class="openModalBtn"><button id="openModalBtn">Order History</button></div>

    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Modal Title</h2>
            <p>This is a simple modal dialog.</p>
        </div>
    </div>
        <div class="contents">
            
            <!-- Your content goes here | check body_cont.css file for css property-->
            <div class="cards">
            @foreach ( $employess as $employee )
                @if ($employee->emp_type=="A")
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
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
                <a href="{{route('hcs_add_rating', ['emp_id' => $employee->emp_id ])}}"><div>4.4<span class="fa fa-star checked"></span>
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

//Enter your page unique js files.
@endsection