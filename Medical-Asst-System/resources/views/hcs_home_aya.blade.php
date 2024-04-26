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
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <div>4.4<span class="fa fa-star checked"></span>
                {{-- <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span> --}}
                </div>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href="{{route('registration')}}"><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                {{-- <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div> 
                </div> 
                <div class='card'> 
                <div class='card-part1'> <img
                src='images/employee.png'
                /></div>
                <div class='card-part2'>
                <strong>Ramesh</strong>
                <p><strong>Organization:</strong> xyz</p>
                <strong><span style='color: red;'>INR 1200  per day</span></strong><br>
                <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 50 Km</p>
                <br>
                <br>
                <a href='/Minor Project 5th_Sem/Emergency_Medical_Support_System/MedTechSupport/bookingForm.php?eid=$rows[eid]&dist=$rows[distance]&booklat=$lat_in_use&booklon=$lon_in_use&book_adrs=$full_address'><button class='btn btn-secondary-orange'>Book</button></a>
                </div>  
                </div> --}}
            </div>
        </div>
@endsection

@section("js")
//Enter your page unique js files.
@endsection