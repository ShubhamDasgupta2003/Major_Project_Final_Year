<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="refresh" content="10"> --}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patient Verification</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{asset("https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css")}}>
    <link rel="stylesheet" href={{asset("css/BedBook/bed_booking_admin.css")}}>
    <title>Bed booking service | Dashboard</title>
    <style>
        /* Add your custom CSS styles here */
        /* You may need to adjust styles to fit your specific requirements */
        body {
            width: 100%;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: 'Poppins',sans-serif;
        }

        .container {
            display: flex;
            /* justify-content: center; */
            align-items: center;
            height: 100%;
            /* background-color: #f3f3f3; */
            background: #f1f5f9;
        }

        .bed-selector {
            display: flex;
            justify-content: center;
            width: 800px;
            /* max-height: 80vh; */
            overflow-y: auto;
            border-radius: 3px;
            /* background-color: #fff; */
            /* box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); */
            /* padding: 20px; */

            border: 0.4mm solid rgba(0, 0, 0, 0.08);
            /* border-radius: 3mm; */
            box-sizing: border-box;
            padding: 10px;
            max-height: 96vh;
            /* overflow: auto; */
            background: white;
            box-shadow: 0px 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .section-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .bed-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .bed {
            width: 50px;
            height: 50px;
            color: white;
            background-color: #009879;
            border: 1px solid #009879;
            outline: 0.3mm solid rgb(180, 180, 180);
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bed.selected {
            background-color: #cceeff;
            /* Blue for selected beds */
        }

        .bed-details {
            /* display: flex;
            justify-content: center; */
            width: 500px;
            height: 217px;
            margin-left: 10px;
            overflow-y: auto;
            border-radius: 3px;
            border: 0.4mm solid rgba(0, 0, 0, 0.08);
            box-sizing: border-box;
            padding: 10px;
            /* max-height: 96vh; */
            background: white;
            box-shadow: 0px 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .edit-btn{
            padding: 2px;
            color: white;
            background-color: #009879;
            border: 1px solid #009879;
            border-radius: 5px;
            cursor: pointer;
        }
        .edit-btn:hover{
            color: #009879;
            background-color: white;
            border: 1px solid #009879;
            transition: 0.2s ease;
        }

        .male-beds {
            /* background-color: red; */
            /* margin-right: 30px; */
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction: column;
            box-sizing: border-box;
            padding: 20px;
        }

        .female-beds {
            /* background-color: blue; */
            /* margin-right: 30px; */
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction: column;
            box-sizing: border-box;
            padding: 20px;
        }

        .section-title {
            font-size: 1.5rem;
            margin: auto auto 10px auto;
            color: black;
            font-weight: 500;
        }
    </style>
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
                        <a href={{url('hos_admin_interface')}}><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{url('pnt_verify')}}"class="active"><span class="las la-hospital"></span>
                    <span>Patient Verification</span></a>
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
            <i class="fa-solid fa-user fa-lg account-avatar"></i>
            <div>
                <!-- <h4> echo $sql2['Name']; </h4> -->
                <h4>Hospital Name</h4>
                <small>Hos Id</small>
            </div>
        </div>
    </header>
    <main>
        <div class="recent-grid">
            <div class="projects">
            <div class="card">
                     <div class="card-header">
                          <h2> Patient Verification</h2>   
                     </div>
                     <div class="card-body">
                        <section class="search">
	                        <form action="{{route('search.patient.id')}}" method="post" id="searchForm">	
                                @csrf	    
		                        <input class="box" name="patient_id" placeholder="Enter patient id..." required>		    	
		                        <button name="submit" class="search-butt box">Search</button>
	                        </form>
                        </section>
                                   <table class="table1" id="table1">
                                   <thead>
                                    <tr>
                                        <td>Patient Id.</td>
                                        <td>Date & Time</td>
                                        <td>Patient Name</td>
                                        <td>Contact Number</td>
                                        <td>Age</td>
                                        <td>Gender</td>
                                        <td>Email</td>
                                        <td>Address</td>
                                        <td>Postal Code</td>
                                        <td>Action</td>
                                    </tr>
                                </thead> 
                                <tbody>

                                <tr>
                                               <td ></td>
                                               <td ></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td><form action='admit.php' method='post'><button class='box' name='admit'>Admit</button></form></td> 
                                            
                                </tbody>
                                    </table>
                                
                                
                                   <table class="table2" id="table2">
                                   <thead>
                                    <tr>
                                        <td>Patient Id.</td>
                                        <td>Date & Time</td>
                                        <td>Patient Name</td>
                                        <td>Contact Number</td>
                                        <td>Age</td>
                                        <td>Gender</td>
                                        <td>Email</td>
                                        <td>Address</td>
                                        <td>Postal Code</td>
                                        <td>Status</td>
                                    </tr>
                                </thead> 
                                <tbody>

                                <tr>
                                               <td ></td>
                                               <td ></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               
                                   </tbody>
                                    </table>
                     </div>
                  </div>
    </main>
    <script>
        setTimeout(function(){
            location.reload();
        }, 10000); // 20 seconds
    </script>
        {{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('searchForm');
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(form);
            fetch('{{ route('search.search') }}', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.table1) {
                    document.getElementById('table1').innerHTML = data.table1;
                    document.getElementById('table1').style.display = 'block';
                    document.getElementById('table2').style.display = 'none';
                } else if (data.table2) {
                    document.getElementById('table2').innerHTML = data.table2;
                    document.getElementById('table2').style.display = 'block';
                    document.getElementById('table1').style.display = 'none';
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script> --}}
</body>
</html>