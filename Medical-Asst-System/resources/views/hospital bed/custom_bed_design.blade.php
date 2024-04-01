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
                    <a href="{{url('custom_bed')}}"class="active"><span class="las la-hospital"></span>
                    <span>Customize Hospital Beds</span></a>
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
        <div class="container">
            <div class="bed-selector">
                <!-- Male Beds Section -->
                <div class="male-beds">
                    <div class="section-title">Male Beds</div>
                    <div class="bed-container male-bed-container">
                        <!-- Male Beds will be dynamically generated here -->
                    </div>
                </div>
    
                <!-- Female Beds Section -->
                <div class="female-beds">
                    <div class="section-title">Female Beds</div>
                    <div class="bed-container female-bed-container">
                        <!-- Female Beds will be dynamically generated here -->
                    </div>
                </div>
    
                <!-- Bed Details Section -->
            </div>
            <div class="bed-details">
                <!-- Bed details will be displayed here -->
            </div>
        </div>
    </main>
    <script>
        // JavaScript code for dynamic bed generation and displaying bed details
        document.addEventListener("DOMContentLoaded", function () {
            const maleBedContainer = document.querySelector('.male-bed-container');
            const femaleBedContainer = document.querySelector('.female-bed-container');
            const bedDetails = document.querySelector('.bed-details');

            // Example data for hospital bed details (can be fetched from a server)
            const bedData = [
                { id: 01, type: 'Male', status: 'Available', details: '<a href="{{url('custom_bed_pntdata')}}"><button class="edit-btn" onclick="editStatus(${bed.id})">Edit/Check Details</button></a> ' },
                { id: 01, type: 'Female', status: 'Occupied', details: '<a href="{{url('custom_bed_pntdata')}}"><button class="edit-btn" onclick="editStatus(${bed.id})">Edit/Check Details</button></a> ' },
                { id: 02, type: 'Male', status: 'Available', details: '<a href="{{url('custom_bed_pntdata')}}"><button class="edit-btn" onclick="editStatus(${bed.id})">Edit/Check Details</button></a> ' },
                { id: 02, type: 'Female', status: 'Available', details: '<a href="{{url('custom_bed_pntdata')}}"><button class="edit-btn" onclick="editStatus(${bed.id})">Edit/Check Details</button></a> ' },
                { id: 03, type: 'Male', status: 'Occupied', details: '<a href="{{url('custom_bed_pntdata')}}"><button class="edit-btn" onclick="editStatus(${bed.id})">Edit/Check Details</button></a> ' },
                { id: 03, type: 'Female', status: 'Occupied', details: '<a href="{{url('custom_bed_pntdata')}}"><button class="edit-btn" onclick="editStatus(${bed.id})">Edit/Check Details</button></a> ' },
                { id: 04, type: 'Male', status: 'Occupied', details: '<a href="{{url('custom_bed_pntdata')}}"><button class="edit-btn" onclick="editStatus(${bed.id})">Edit/Check Details</button></a> ' },
                { id: 05, type: 'Male', status: 'Occupied', details: '<a href="{{url('custom_bed_pntdata')}}"><button class="edit-btn" onclick="editStatus(${bed.id})">Edit/Check Details</button></a> ' },
                { id: 06, type: 'Male', status: 'Occupied', details: '<a href="{{url('custom_bed_pntdata')}}"><button class="edit-btn" onclick="editStatus(${bed.id})">Edit/Check Details</button></a> ' },
                { id: 04, type: 'Female', status: 'Occupied', details: '<a href="{{url('custom_bed_pntdata')}}"><button class="edit-btn" onclick="editStatus(${bed.id})">Edit/Check Details</button></a> ' },
                { id: 07, type: 'Male', status: 'Occupied', details: '<a href="{{url('custom_bed_pntdata')}}"><button class="edit-btn" onclick="editStatus(${bed.id})">Edit/Check Details</button></a> ' },
                { id: 08, type: 'Male', status: 'Occupied', details: '<a href="{{url('custom_bed_pntdata')}}"><button class="edit-btn" onclick="editStatus(${bed.id})">Edit/Check Details</button></a> ' },
                { id: 05, type: 'Female', status: 'Occupied', details: '<a href="{{url('custom_bed_pntdata')}}"><button class="edit-btn" onclick="editStatus(${bed.id})">Edit/Check Details</button></a> ' },
                { id: 06, type: 'Female', status: 'Occupied', details: '<a href="{{url('custom_bed_pntdata')}}"><button class="edit-btn" onclick="editStatus(${bed.id})">Edit/Check Details</button></a> ' },
                { id: 07, type: 'Female', status: 'Occupied', details: '<a href="{{url('custom_bed_pntdata')}}"><button class="edit-btn" onclick="editStatus(${bed.id})">Edit/Check Details</button></a> ' },
                { id: 08, type: 'Female', status: 'Occupied', details: '<a href="{{url('custom_bed_pntdata')}}"><button class="edit-btn" onclick="editStatus(${bed.id})">Edit/Check Details</button></a> ' },
                // Add more bed data as needed
            ];

            // Function to create beds dynamically based on data
            function createBeds() {
                bedData.forEach(bed => {
                    const bedElement = document.createElement('div');
                    bedElement.classList.add('bed');
                    bedElement.setAttribute('data-id', bed.id);
                    bedElement.setAttribute('data-status', bed.status);
                    bedElement.setAttribute('data-type', bed.type);
                    // new 
                    // if(bed.gender === 'Male') {
                    //     bedElement.textContent = `M ${bed.id}`; 
                    // }else(bed.gender === 'Female'){
                    //     bedElement.textContent = `F ${bed.id}`;
                    // }
                    // new 

                    bedElement.textContent = `${bed.id}`;
                    bedElement.addEventListener('click', () => displayBedDetails(bed));
                    bedElement.addEventListener('click', () => {
                        bedElement.style.transition = 'background-color 0.2s ease';
                        bedElement.style.backgroundColor = 'white';
                        bedElement.style.Color = '#009879';

                        // Revert the color back to white after 1 second (1000 milliseconds)
                        setTimeout(() => {
                            bedElement.style.backgroundColor = '#009879'; // Revert to original color (white)
                        }, 100); // 1000 milliseconds = 1 second
                    });

                    // Determine which bed container to append the bed to based on gender
                    if (bed.type === 'Male') {
                        maleBedContainer.appendChild(bedElement);
                        // bedElement.textContent = `M ${bed.id}`;
                    } else if (bed.type === 'Female') {
                        femaleBedContainer.appendChild(bedElement);
                        // bedElement.textContent = `F ${bed.id}`;
                    }
                });
            }

            // Function to display bed details
            function displayBedDetails(bed) {
                bedDetails.innerHTML = `
          <h3>Bed Details</h3>
          <p><strong>Bed ID:</strong> ${bed.id}</p>
          <p><strong>Type:</strong> ${bed.type} Bed</p>
          <p><strong>Status:</strong> ${bed.status}</p>
          <p><strong>All Details:</strong> ${bed.details}</p>
        `;
            }

            // Initialize the interface
            createBeds();
        });
    </script>
</body>
</html>