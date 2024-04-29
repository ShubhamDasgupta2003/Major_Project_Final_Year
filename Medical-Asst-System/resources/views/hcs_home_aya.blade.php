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
                <div>4.4<span class="fa fa-star checked"></span>
                </div>
                <strong><span style='color: red;'>INR {{$employee->emp_salary}}  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href="{{route('registration', ['emp_id' => $employee->emp_id ])}}"><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
           @endif
        @endforeach
            </div>
        </div>
@endsection

@section("js")
//Enter your page unique js files.
@endsection