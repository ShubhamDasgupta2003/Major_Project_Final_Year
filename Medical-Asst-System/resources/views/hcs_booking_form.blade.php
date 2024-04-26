<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/hcs_booking_form.css">
    <link rel="stylesheet" href="css/navlink.css">

</head>
<body>
    <div class="container">
        <div class="card">
            <img src="images/employee.png" alt="">
            <div class="column">
                <div class="patient_info_cont">
    
                    <form method="post">
                        @csrf
                        <label for="">Full Name<sup class="mandatory">*</sup></label>
                        <input type="text" name="name" id="" placeholder="Enter full name" value="{{old('name')}}" >
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="">Gender<sup class="mandatory">*</sup></label>
                        <select>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>
                        </select>
                        @error('contact')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="">Mobile No.<sup class="mandatory">*</sup></label>
                        <input type="tel" name="contact" id="" placeholder="Contact number" value="{{old('contact')}}" >
                        @error('contact')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="">Land Mark<sup class="mandatory">*</sup></label>
                        <input type="text" name="lmark" id="" placeholder="Land Mark" value="{{old('lmark')}}">
                        @error('lmark')
                        <span class="text-danger">{{ "The Land Mark Field Is Required."}}</span>
                        @enderror
                        <label for="address">Your Address<sup class="mandatory">*</sup></label>
                        <textarea type="text" name="address" id="address">{{old('address')}}</textarea>
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <a href="{{route('hcs_booking_confirmation')}}"><button class="btn" name="book_ride">Confirm</button></a>
                    <a href="ambulance_booking.php"><button class="btn-danger" name="cancel_ride">Cancel</button></a>
                     </form>
                </div>
            </div>     
        </div>
    </div>
</body>
</html>