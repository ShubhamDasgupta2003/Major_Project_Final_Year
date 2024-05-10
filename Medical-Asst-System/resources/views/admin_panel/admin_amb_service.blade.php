


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/adminb.css')}}">
    <title>Ambulance Admin</title>
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
                <a href="{{route('admin_panel.index')}}"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                <a href="{{route('admin_panel.admin_medical_supplies')}}"><span class="las la-shopping-bag"></span>
                    <span>Medical Supplies</span></a>
                </li>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/ambulance Srvc admin/amb_srvc_admin.php"  class="active"><span class="las la-ambulance"></span>
                    <span>Ambulance Service</span></a>
                </li>
                <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/Blood_Bank/adminb.php" ><i class="fa-solid fa-building-columns"></i></span>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/Blood_Bank/adminb.php"> <span class="las la-landmark"></span>
                    <span>Blood Bannk Service</span></a>
                </li>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/bed booking admin/bed_booking_admin.php" ><span class="las la-hospital"></span>
                    <span>Bed Booking Service</span></a>
                </li>
                <li>
                    <a href="/Minor Project 5th_Sem/Emergency_Medical_Support_System/admin panel/MedTechSupport/medtech_admin.php" ><span class="las la-hospital"></span>
                    <span>Aya/Nurse/Medical Technician</span></a>
                </li>
              <!--  <li>
                    <a href=""><span class="las la-clipboard-list"></span>
                    <span>Projects</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-shopping-bag"></span>
                    <span>Orders</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-circle"></span>
                    <span>Inventory</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-circle"></span>
                    <span>Accounts</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-clipboard-list"></span>
                    <span>Inventory</span></a>
                </li>  -->
            </ul>
        </div>
    </div>

   <div class="main-content">
    <header>
        <h3>
           <label for="nav-toggle">
             <span class="las la-bars"></span>
           </label>
           Ambulance Admin Dashboard
        </h3>
       
    </header>
    <main>
        <div class="cards">
            <div class="card-single bg-primary">
                <div>
                  
                    <h1 style="color: #fff;">{{$reg_Drivers[0]->count}}</h1>
                    <span>Drivers Registered</span>
                </div>
                <div>
                    <span class="las la-users" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single bg-success">
                <div>
                    
                    <h1 style="color: #fff;">{{$success_rides[0]->count}}</h1>
                    <span>Successful Rides</span>
                </div>
                <div>
                    <span class="las la-ambulance" style="color: #fff;"></span>
                </div>
            </div>
            <div class="card-single bg-secondary">
                <div>
                    <h4 style="color: #fff;"> &#8377 {{$cur_month_income[0]->amount}}</h4>
                    <span>Income(Current Month)</span>
                </div>
                <div>
                   <span class="lab la-google-wallet" ></span>  
                </div>
            </div>
        </div>

        <div class="row main-menu-select">
            <div class="col-md-12 mt-3">
                <select name="" id="main_menu" class="form-select">
                    <option value="" disabled selected=true>Choose Report Type</option>
                    <option value="i">Income Report</option>
                    <option value="r">Rides Report</option>
                </select>
            </div>
        </div>
        <div class="row ride-report-menu mt-3">
            <div class="col-md-3 income_month_menu">
                <select name="" id="income_month_menu" class="form-select income-select-menu">
                    <option value="" disabled selected=true>Select month</option>
                    <option value="all">All</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
            <div class="col-md-3 income_year_menu">
                <select name="" id="income_year_menu" class="form-select income-select-menu">
                    <option value="" disabled>Select Year</option>
                    <option value="{{$avbl_years[0]->years}}" selected=true>{{$avbl_years[0]->years}}</option>
                    @for($i=1;$i<sizeof($avbl_years);$i++)
                        <option value="{{$avbl_years[$i]->years}}">{{$avbl_years[$i]->years}}</option>
                    @endfor
                    
                </select>
            </div>
            <div class="col-md-3 ride_status_menu">
                <select name="" id="ride_status" class="form-select">
                    <option value="" disabled>Select ride status</option>
                    <option value="111" selected=true>Successful</option>
                    <option value="101">Driver declined</option>
                    <option value="010">Patient cancelled</option>
                    <option value="011">Ride inprogress</option>
                </select>
            </div>
            <div class="col-md-3 ride_type_menu">
                <select name="" id="ride_type" class="form-select">
                    <option value="" disabled>Select ride type</option>
                    <option value="'normal'" selected=true>Normal</option>
                    <option value="'Life-support'">Life Support</option>
                </select>
            </div>
        </div>

        <div class="income-report-menu mt-3">
            <div class="row">
                <div class="col-md-3 income_month_menu">
                    <select name="" id="income_months" class="form-select income-select-menu">
                        <option value="" disabled selected=true>Select month</option>
                        <option value="all">All</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="col-md-3 income_year_menu">
                    <select name="" id="income_years" class="form-select income-select-menu">
                        <option value="" disabled>Select Year</option>
                        <option value="{{$avbl_years[0]->years}}" selected=true>{{$avbl_years[0]->years}}</option>
                        @for($i=1;$i<sizeof($avbl_years);$i++)
                            <option value="{{$avbl_years[$i]->years}}">{{$avbl_years[$i]->years}}</option>
                        @endfor
                        
                    </select>
                </div>
                <div class="col-md-3 payment_status_menu">
                    <select name="" id="payment_status" class="form-select">
                        <option value="" disabled>Select status</option>
                        <option value="'complete'" selected=true>Successful</option>
                        <option value="'initiated'">Incomplete</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row query-table mt-3">
            <div class="col-md-6">
                <canvas id="ridesChart" class="text-center mt-3" style="width:100%;max-width:700px"></canvas>

                <canvas id="incomeChart" class="text-center mt-3" style="width:100%;max-width:700px"></canvas>
            </div>
            <div class="col-md-6 ride-report-summary">
                <div class="row text-center">
                    <h3>Overview</h3>
                </div>
                <div class="row mt-3 text-center">
                    <div class="col-md-6">
                        <div class="card-single bg-primary">
                            <div>
                                <h1 style="color: #fff;" id="total_count"></h1>
                                <span>Total Rides</span>
                            </div>
                            <div>
                                <span class="las la-ambulance" style="color: #fff;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-single bg-warning">
                            <div>
                                <h1 style="color: #000000;" id="avg_count"></h1>
                                <span class="text-dark">Avg Rides</span>
                            </div>
                            <div>
                                <span class="las la-ambulance" style="color: #000000;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 income-report-summary">
                <div class="row text-center">
                    <h3>Overview</h3>
                </div>
                <div class="row mt-3 text-center">
                    <div class="col-md-6">
                        <div class="card-single bg-success">
                            <div>
                                <h1 style="color: #fff;" id="total_income"></h1>
                                <span>Yearly Income</span>
                            </div>
                            <div>
                                <span class="las la-hand-holding-usd" style="color: #fff;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-single bg-warning">
                            <div>
                                <h1 style="color: #000000;" id="avg_income"></h1>
                                <span class="text-dark">Avg Income</span>
                            </div>
                            <div>
                                <span class="las la-hand-holding-usd" style="color: #000000;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
   </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

    
    function addElements(arr)
    {
        sum=0;
        for(i=0;i<arr.length;i++)
        {
            sum+=arr[i];
        }
        return sum;
    }

    $(document).ready(function(){

        var xValues = [];
        var yValues = [];
        var months = [ "January", "February", "March", "April", "May", "June", 
           "July", "August", "September", "October", "November", "December" ];
        var barColors = ["#f57242", "#009113","#009ff5","#f5cc00","#7d0096","#7a0140","#7a0140","#7a0140","#ff3d12","#94ff12","#94ff12","#ffcf6e"];
        var chartId;
        var incomeChartId;

        $('.income-report-menu').hide();
        $('.ride-report-menu').hide();
        $('.ride-report-summary').hide();
        $('.income-report-summary').hide();

        $('#main_menu').on('change',function()
    {
        var option = $('#main_menu').val();
        xValues.length=0;
        yValues.length=0;
        if(option=='i')
        {
            $('.income-report-menu').show();
            $('.ride-report-menu').hide();
            $('#ridesChart').hide();
            $('#incomeChart').show();
            $('.ride-report-summary').hide();
            $('.income-report-summary').show();
            incomeChartId = new Chart(incomeChart, {
                    type: 'bar',
                    data: {
                        labels: xValues,
                        datasets: [{
                        label: "Payments Data",
                        data: yValues,
                        backgroundColor: barColors,
                        borderWidth: 2,
                        }],
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                display: true,
                                stacked: true,
                                ticks: {
                                    min: 0, // minimum value
                                    // max:  // maximum value
                                }
                            }]
                        },
                        responsive: true,
                    }
                });
        }
        else if(option=='r')
        {
            $('.ride-report-menu').show();
            $('.ride-report-summary').show();
            $('#ridesChart').show();
            $('#incomeChart').hide();
            $('.income-report-summary').hide();
            $('.income-report-menu').hide();
            chartId = new Chart(ridesChart, {
                    type: 'bar',
                    data: {
                        labels: xValues,
                        datasets: [{
                        label: "No. of rides per month",
                        data: yValues,
                        backgroundColor: barColors,
                        borderWidth: 2,
                        }],
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                display: true,
                                stacked: true,
                                ticks: {
                                    min: 0, // minimum value
                                    // max:  // maximum value
                                }
                            }]
                        },
                        responsive: true,
                    }
                });
        }
    })

        $('.ride-report-menu').on('change',function(){
            var month = $('#income_month_menu').val()
            var year = $('#income_year_menu').val();
            var ride_type = $('#ride_type').val();
            var ride_status = $('#ride_status').val();
            // console.log(month);
            // console.log(year);
            $.ajax({
                url:"{{route('amb_admin_show_data')}}",
                type:'GET',
                data:{'month':month,'year':year,'ride_type':ride_type,'ride_stat':ride_status,'qtype':'ride_report'},
                success:function(data){
                    console.log(data);
                    xValues.length=0;
                    yValues.length=0;
                    var len = (data.data).length;
                    for(i=0;i<len;i++)
                    {
                        xValues.push(months[(data.data[i].months)-1]);
                        yValues.push(data.data[i].count);
                    }

                    var totalRides = addElements(yValues);
                    var avgRides = Math.round(totalRides/yValues.length);
                    $('#total_count').text(totalRides);
                    $('#avg_count').text(avgRides);
                    chartId.update();
                }
            });
        })

        $('.income-report-menu').on('change',function(){
            var month = $('#income_months').val()
            var year = $('#income_years').val();
            var status = $('#payment_status').val();

            $.ajax({
                url:"{{route('amb_admin_show_data')}}",
                type:'GET',
                data:{'month':month,'year':year,'p_stat':status,'qtype':'income_report'},
                success:function(data){
                    console.log(data);
                    xValues.length=0;
                    yValues.length=0;
                    var len = (data.data).length;
                    for(i=0;i<len;i++)
                    {
                        xValues.push(months[(data.data[i].months)-1]);
                        yValues.push(data.data[i].amount);
                    }

                    var totalAmount = addElements(yValues);
                    var avgAmount = Math.round(totalAmount/yValues.length)
                    $('#total_income').text(totalAmount + "/-");
                    $('#avg_income').text(avgAmount + "/-");
                    incomeChartId.update();
                }
            });
        })
    })
</script>

</body>
</html>