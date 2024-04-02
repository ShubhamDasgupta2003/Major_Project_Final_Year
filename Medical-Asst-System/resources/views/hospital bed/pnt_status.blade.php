<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{asset("https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css")}}>
    <link rel="stylesheet" href={{asset("css/BedBook/bed_booking_admin.css")}}>
    <title>Bed booking service | Dashboard</title>
</head>
<style>
     body {
            width: 100%;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: 'Poppins',sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* .container {
            display: flex;
           
            align-items: center;
            height: 100%;
           
            background: #f1f5f9;
        } */
        .bed-details {
            /* display: flex;
            justify-content: center; */
            width: 400px;
            height: 400px;
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
        h2{
            margin-left: 100px;
            color: #009879;
        }
        hr{
            height: 3px;
            background-color: #009879;;
        }

        .pnt-details{
            margin-top: 15px;
            /* background-color: rgb(190, 126, 126); */
        }

        .release-btn{
            /* background-color: red; */
            padding: 2px;
            color: white;
            background-color: #009879;
            border: 1px solid #009879;
            border-radius: 5px;
            cursor: pointer;
        }
        .release-btn:hover{
            color: #009879;
            background-color: white;
            border: 1px solid #009879;
            transition: 0.2s ease;
        }
        

</style>
<body>
    <div class="bed-details">
        <div class="heading">
            <h2>Patient Details</h2>
            <hr>
        </div>
        <div class="pnt-details">
        <p><strong>Name: </strong>sourav paul</p>
        <p><strong>Id: </strong>PNT755194</p>
          <p><strong>ContactNo: </strong>8697921086</p>
          <p><strong>e-mail: </strong>sourav97972@gmail.com</p>
          <p><strong>Age: </strong>21</p>
          <p><strong>Gender: </strong>male</p>
          <p><strong>Address: </strong>27,thakur para road. naihati</p>
          <p><strong>Pincode: </strong>743165</p>
          <p><strong>Booking Date: </strong>28-march-2024</p>
        </div>
        <div class="release-btn-class">
            <a href="#"><button class="release-btn" onclick="showAlert()">Release Patient</button></a>
        </div>
        <!-- Bed details will be displayed here -->
    </div>
    <script>
        function showAlert() {
    alert("Patient Released!!");
  }
    </script>
</body>
</html>