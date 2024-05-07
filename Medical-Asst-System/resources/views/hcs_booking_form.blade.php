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
                        <input type="hidden" name="emp_id" value="{{ request()->input('emp_id') }}">
                        <label for="">Full Name<sup class="mandatory">*</sup></label>
                        <input type="text" name="name" id="" placeholder="Enter full name" value="{{old('name')}}" >
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="">Gender<sup class="mandatory">*</sup></label>
                        <select name="gender">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Others</option>
                        </select>
                        @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br/>
                        <label for="">Mobile No.<sup class="mandatory">*</sup></label>
                        <input type="tel" name="contact_num" id="" placeholder="Contact number" value="{{old('contact_num')}}" >
                        @error('contact_num')
                        <span class="text-danger">{{ "The Contact Field Is Required." }}</span>
                        @enderror
                        <label for="">Land Mark<sup class="mandatory">*</sup></label>
                        <input type="text" name="land_mark" id="" placeholder="Land Mark" value="{{old('land_mark')}}">
                        @error('land_mark')
                        <span class="text-danger">{{ "The Land Mark Field Is Required."}}</span>
                        @enderror
                        <label for="address">Your Address<sup class="mandatory">*</sup></label>
                        <textarea type="text" name="address" id="address">{{old('address')}}</textarea>
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="">District<sup class="mandatory">*</sup></label>
                        <input type="text" name="district" id="" placeholder="District" value="{{old('district')}}">
                        @error('district')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="">State<sup class="mandatory">*</sup></label>
                        <input type="text" name="state" id="" placeholder="State" value="{{old('state')}}">
                        @error('state')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="">PIN Code<sup class="mandatory">*</sup></label>
                        <input type="number" name="pincode" id="" placeholder="PIN code" value="{{old('pincode')}}">
                        @error('pincode')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @php
                        $emp_id = request('emp_id');
                         @endphp
                        <a href="{{route('hcs_booking_confirmation',['emp_id' =>$emp_id])}}"><button class="btn"id="btn" name="book_ride">Confirm</button></a>
                     </form>
                    <a href="{{route('home')}}"><button class="btn-danger" name="cancel_ride">Cancel</button></a>
                </div>
            </div>     
        </div>
    </div>
    
    <script>
     let user_id = urlParams.get('variable');
     console.log(user_id);
      $('#btn').on('click',function(){
                  $.ajax({
                    url:'{{route('reg_subm')}}',
                    type:'POST',
                    data:{'inv_id':inv_id,'dist':distance},
                    success:function(data){
                      window.location.href = "{{url('/')}}/payment?order_id="+data.order_id+"&amount="+data.amb_ride_amount+"&user_id="+data.user_id;
                    }
                  })
                })
    <script/>

</body>
</html>