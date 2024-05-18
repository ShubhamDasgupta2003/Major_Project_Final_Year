<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/BloodBank/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Blood Bank | Dashboard</title>
</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"></span><span>Index</span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span class="las la-landmark"></span>
                        <span>Your Blood Bank</span></a>
                </li>
               
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h3>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h3>
            <div class="search-wrapper">
            </div>
            <div class="user-wrapper">
                <div>
                    <h5><i class="fa-solid fa-user fa-lg account-avatar"></i> @php
                        echo $bloodBankName = Session::get('bloodBank_name')
                        @endphp
                        <a href=" {{route('open_bldBanks_details')}} "><i class="fa-solid fa-pen-to-square"></i></a>
                    </h5>
                </div>
            </div>
        </header>
        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1 style="color: #fff;">{{$totalOrders}}</h1>
                        <span>Successful Orders</span>
                    </div>
                    <div>
                        <span class="las la-check-circle" style="color: #fff;"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <div>
                            <h1 style="color: #fff;">{{$totalOrdersIn24hr}}</h1>
                            <span style="font-size: 16px">Today's order</span>
                        </div>
                    </div>
                    <div>
                        <span class="las la-clock" style="color: #fff;"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1 style="color: #fff;">{{$totalEarnings}}</h1>
                        <span>Income</span>
                    </div>
                    <div>
                        <span class="las la-wallet"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h2>Pending Orders</h2>
                    </div>
                    <div class="card-body table table-bordered">
                        <table width="100%" id="pending_order">
                            <thead>
                                <tr>
                                    <td>Order Id</td>
                                    <td>Blood Group</td>
                                    <td>Quantity</td>
                                    <td>Date</td>
                                    <td>Time</td>
                                    <td>Prescription</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bloodOrders as $order)
                                <tr>
                                    <td>{{ $order->order_id }}</td>
                                    <td>{{ $order->blood_gr }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->date }}</td>
                                    <td>{{ $order->time }}</td>
                                    <td><a href="{{ $order->prex }}"><i class="fa-solid fa-eye img-link"></i></a></td>
                                    <td>
                                        <div class="action d-flex justify-content-between">
                                            <div class="approve btn btn-primary btn-sm me-2">
                                                <a href="/approve_bld_order/{{$order->order_id}}" class="links">Approve</a>
                                            </div>
                                            <div class="cancel btn btn-danger btn-sm ms-2">
                                                <a href="/cancel_bld_order/{{$order->order_id}}" class="links">Cancel</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h2>Blood Orders</h2>
                        </div>
                        <div class="card-body">
                            <table width="100%" id="completed_orders">
                                <thead>
                                    <tr>
                                        <td>Order Id</td>
                                        <td>Blood Group</td>
                                        <td>Quantity</td>
                                        <td>Date</td>
                                        <td>Time</td>
                                        <td>Blood Group</td>
                                        <td>Price</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bloodOrders_complete as $order)
                                    <tr>
                                        <td>{{ $order->order_id }}</td>
                                        <td>{{ $order->blood_gr }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->date }}</td>
                                        <td>{{ $order->time }}</td>
                                        <td>{{ $order->blood_gr }}</td>
                                        <td>{{ $order->price }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2>Blood Details</h2>
                    </div>
                    <div class="card-body table table-bordered">
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td>Blood Group</td>
                                    <td>Quantity</td>
                                    <td>Operations</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bloodRecords as $group)
                                <tr>
                                    <td>{{ $group->blood_group }}</td>
                                    <form action=" {{route('update_blood_details')}} " method="POST">
                                        @csrf
                                        <td><input type="number" name="ucount" class="form-control" value="{{ $group->count}}"></td>
                                        <input type="hidden" name="bg_id" value="{{ $group->blood_group_id }}">
                                        <td><input type="submit" value="Update" name="submit" class="btn btn-sm btn-success"></td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <style>
        .links {
            text-decoration: none;
            color: #fff;
            margin-left: 5px;
        }

        .img-link {
            color: #009879;
            font-size: 25px;
            text-align: center;
        }
    </style>
</body>

</html>
