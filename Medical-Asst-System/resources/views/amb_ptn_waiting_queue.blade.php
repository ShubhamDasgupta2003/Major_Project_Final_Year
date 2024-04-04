<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ride Assignment</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center" style="height:100vh">

    <h5>Please wait...</h5>
    <div class="spinner-grow text-success" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <h1>List of rides available</h1>
    @foreach($data as $record)
        <div class="card mt-3" style="width: 25rem;">
            <div class="card-body">
                <h5 class="card-title">{{$record['ambulance_name']}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$record['amb_no']}}</h6>
                <p class="card-text"><i class="fa-solid fa-user-nurse"></i>  {{$record['driver']}}</p>
                <h4><i class="fa-solid fa-phone"></i> {{$record['mobile']}}</h4>
            </div>
        </div>
    @endforeach
    </div>
    
</body>
</html>