<!-- b.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>

    <h1> Data </h1>
    @if(Session::has('bloodB_search_result'))
        @php
            $banks = Session::get('bloodB_search_result');
        @endphp

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

</body>
</html>
