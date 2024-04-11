$(document).ready(function(){
    $("#submit").on('click', function(){
        const value = $('#search').val();

        // Show loading spinner (if you have one)

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
                        html += '<tr>' +
                     
                        '<td>' + banks[i]['name'] + '</td>' +
                        '<td>' + banks[i]['city'] + '</td>' +
       
                        '</tr>'
                    }
                } else {
                    html += '<div class="card"><div class="card-details"><p class="card-fare" style="text-align: center;">Data not found</p></div></div>';
                }

                // Append generated HTML to the container
                $("#bloodCard").html(html);
            }
        });
    });
});
