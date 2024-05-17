<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Update User Details</title>
    <!-- Custom CSS File -->
    <link rel="stylesheet" href="{{ asset('css/BloodBank/signup.css') }}" />
</head>
<body>
    <section class="container">
        <div class="title-bar">
            <img src="{{ asset('images/HomePage/logo.png') }}" alt="logo" width="70px">
            <header>Update your details</header>
        </div>
        <form class="form" method="post" action=" {{route('update_data')}} ">
            @csrf
            <div class="column">
                <div class="input-box">
                    <label>First Name</label>
                    <input name="fname" type="text" value="{{ $data->user_first_name ?? '' }}" placeholder="Enter your first name" required />
                </div>

                <div class="input-box">
                    <label>Last Name</label>
                    <input name="lname" type="text" value="{{ $data->user_last_name ?? '' }}" placeholder="Enter your last name" required />
                </div>
            </div>
            <div class="input-box">
                <label>Email Address</label>
                <input name="email_id" type="text" value="{{ $data->user_email ?? '' }}" placeholder="Enter email address" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Phone Number</label>
                    <input name="contact_num" type="number" value="{{ $data->user_contactno ?? '' }}" placeholder="Enter phone number" required minlength="10" maxlength="10" />
                </div>
                <div class="input-box">
                    <label>Date of Birth</label>
                    <input name="dob" id="dtpick" type="date" value="{{ $data->user_dob ?? '' }}" placeholder="Enter birth date" required />
                </div>
            </div>

            <div class="input-box address">
                <label>Address</label>
                <div class="column">
                    <div class="select-box">
                        <select name="districts">
                            @foreach ($districts as $district)
                                @if ($data->user_district == $district)
                                    <option value="{{ $district }}" selected>{{ $district }}</option>
                                @else
                                    <option value="{{ $district }}">{{ $district }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <input type="text" value="{{ $data->user_city ?? '' }}" placeholder="Enter your city/vill" required name="city-vill">
                </div>
                <div class="column">
                    <input type="text" value="{{ $data->user_state ?? '' }}" placeholder="Enter your state" required name="state" />
                    <input type="number" value="{{ $data->pincode ?? '' }}" placeholder="Enter postal code" required name="post_code" />
                </div>
            </div>

            <button id="sbmt-form" type="submit" name="register_user">Update</button>
        </form>
    </section>
</body>
</html>
