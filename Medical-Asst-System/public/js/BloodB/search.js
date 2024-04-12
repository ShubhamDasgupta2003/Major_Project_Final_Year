$(document).ready(function(){
    $("#submit").on('click', function(){
        const value = $('#search').val();

        // Make AJAX request
        $.ajax({
            url: "/showBhome",
            type: "GET",
            data: {'search': value},
            success: function(data){
                let banks = data.bloodbanks;
                let html = '';

                if (banks.length > 0) {
                    for (let i = 0; i < banks.length; i++) {
                        html += `
                            <div class='card'>
                                <img src='images/BloodB/Blood_Bank.png'>
                                <div class='card-details'>
                                    <h1 class='card-name'>${banks[i].name}</h1>
                                    <h2 class='card-address'><i class='fa-solid fa-location-dot'></i>${banks[i].city}, ${banks[i].state}</h2>
                                    
                                    <div class='distance-gr'>
                                        <p class='card-type'>Blood Group: <span class='blood-gr'>${banks[i].group_name}</span></p>
                                        <h2 class='card-distance'><i class='fa-solid fa-route fa-lg' style='color: #00b37d;'></i> 27 Km</h2>
                                    </div>
                                    <div class='buy-price'>
                                        <a href='${banks[i].booking_form_route}'><button class='btn buy'>Buy</button></a>
                                        <p class='card-fare'>&#8377 ${banks[i].price}/-</p>
                                    </div>
                                </div>
                            </div>`;
                    }
                } else {
                    html += '<div class="card-details"><p class="card-fare" style="text-align: center;">Data not found</p></div>';
                }

                // Append generated HTML to the container
                $("#bloodCard").html(html);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Handle error here, e.g., display an error message
            }
        });
    });
});