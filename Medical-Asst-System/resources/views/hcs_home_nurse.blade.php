@extends("hcs_template")

@section("title")
Nurse
@endsection
@section("main")
<!-- header section end -->        
<section class="body-container">
    <div>
        <nav class="segmented-navigation">
            <a href="/aya" class="segmented-item">Aya</a>
            <a href="/nurse" class="segmented-item active">Nurse</a>
            <a href="/technician" class="segmented-item">Technician</a>
        </nav>
    </div>
    <br/>
    <div class="contents">
        <div class="cards" id="employeeCards">
            @foreach ($employees as $employee)
                @if ($employee->emp_type == "N")
                    <div class='card' data-lat="{{$employee->emp_loc_lat}}" data-lng="{{$employee->emp_loc_long}}">
                        <div class='card-part1'>
                            <img src="{{ asset('storage/' . $employee->emp_photo_path) }}" />
                        </div>
                        <div class='card-part2'>
                            <strong>{{$employee->emp_name}}</strong><br/>
                            <strong>
                                @if($employee->emp_gender == "M")
                                    {{"Male"}}
                                @elseif($employee->emp_gender == "F")
                                    {{"Female"}}
                                @else
                                    {{"Others"}}
                                @endif
                            </strong>
                            <a href="{{route('hcs_show_rating', ['emp_id' => $employee->emp_id ])}}">
                                <div>{{$employee->rating_value}}<span class="fa fa-star checked"></span></div>
                            </a>
                            <strong>
                                <span style='color: red;'>INR {{$employee->emp_salary}} per day</span>
                            </strong><br>
                            <strong>Book Amount:<span style='color: blue;'> INR 500</span></strong>
                            <p class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> <span class="distance">Calculating...</span> Km</p>
                            <br><br>
                            <a href="{{route('registration', ['emp_id' => $employee->emp_id ,'img' => $employee->emp_photo_path ,'emp'=>$employee->emp_type])}}">
                                <button class='btn btn-secondary-orange' style="width:100%; border-radious:1px; height:30px;">&nbsp;&nbsp;Book&nbsp;&nbsp;</button>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
@endsection

@section("js")
<script>
let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

window.onscroll = () => {
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

// User's latitude and longitude (replace with actual user's location)
const userLat = @json($userinfo->user_lat_in_use);
const userLng = @json($userinfo->user_long_in_use);

// Mapbox access token
const accessToken = 'pk.eyJ1IjoiZGVlcHJhanB1dCIsImEiOiJjbHc5aGJtZ2QwMTh2MmpwYXZyMzI0eTB2In0.RFnVOFGJY66G-ZEZx-ajDw';

// Function to calculate distance using Mapbox Directions API
async function calculateDistance(empLat, empLng) {
    const url = `https://api.mapbox.com/directions/v5/mapbox/driving/${userLng},${userLat};${empLng},${empLat}?access_token=${accessToken}`;
    try {
        const response = await fetch(url);
        const data = await response.json();
        if (response.ok) {
            const distance = data.routes[0].distance / 1000; // Distance in kilometers
            return distance.toFixed(2); // Return distance with 2 decimal places
        } else {
            console.error('Error:', data.message);
            return 'N/A';
        }
    } catch (error) {
        console.error('Error fetching data:', error);
        return 'N/A';
    }
}

// Function to update distances in the HTML and sort the cards
async function updateDistances() {
    const cards = Array.from(document.querySelectorAll('.card'));
    const distances = await Promise.all(cards.map(async (card) => {
        const empLat = card.getAttribute('data-lat');
        const empLng = card.getAttribute('data-lng');
        const distance = await calculateDistance(empLat, empLng);
        card.querySelector('.distance').textContent = distance;
        return { card, distance: parseFloat(distance) };
    }));

    distances.sort((a, b) => a.distance - b.distance);

    const container = document.getElementById('employeeCards');
    container.innerHTML = '';
    distances.forEach(({ card }) => {
        container.appendChild(card);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    updateDistances();
});
</script>

@endsection
