<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1>Search</h1>
    {{-- <form action="" class="row g-3"> --}}
        <div class="col-7">
            <input type="search" class="form-control" id="search" placeholder="Search for ...">
        </div>
        <div class="col-md-auto">
            <button class="btn btn-primary" id="submit">Search</button>
        </div>
    {{-- </form> --}}
    {{-- <div class="col-6">
        <form action="">
            <button class="btn btn-primary">Search</button>
        </form>
    </div> --}}

    @if(Session::has('search_result'))
    @php
        $banks = Session::get('search_result');
    @endphp

    {{-- for loading --}}
    <div class="loadingOperations">
        <div id="loading" class="loader">
            <i class="fas fa-spinner fa-spin"></i>
        </div>
        <div id="loading-message"></div>
    </div>
    {{-- for loading --}}

    @if(count($banks) > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banks as $bank)
                    <tr>
                        <td>{{ $bank->id }}</td>
                        <td>{{ $bank->name }}</td>
                        <td>{{ $bank->city }}</td>
                        <td>{{ $bank->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No banks found.</p>
    @endif

@endif
    
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    <style>
        .loadingOperations{
            display: flex;
            width:300px;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .loader {
            border: 8px solid #f3f3f3; /* Light grey */
            border-top: 8px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
            /* margin:0; */
           /* margin: auto;  Center the spinner */
            display: none; /* Initially hidden */
        }
        
        #loading-message {
        display: none; /* Initially hidden */
        text-align: center;
    }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    
    <script>
        $(document).ready(function(){
        $("#submit").on('click', function(){
            const value = $('#search').val();

            // Show loading spinner
            $("#loading").show();
            $("#loading-message").text("Please wait.").show();

            // Simulate loading time of 5 seconds
                setTimeout(function() {
                    // AJAX request
                    $.ajax({
                        url: "{{ route('searchtest') }}",
                        type: "GET",
                        data: {'search': value},

                        success: function(data){
                            // Redirect to searchtest route
                            console.log(data);
                            $("#loading").hide();
                            $("#loading-message").hide();

                            window.location.href = "{{ route('searchtest') }}";
                        
                        },
                    });
                },700); // 5-second delay
             });
        });

    </script>
    
    
    
</body>
</html>