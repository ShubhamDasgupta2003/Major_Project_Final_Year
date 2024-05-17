<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link href="{{ asset('css/BedBook/form_book.css') }}" rel="stylesheet">
</head>

<body>
    <section class="container">
        <header>
            <div class="parent">
                <div class="logo">
                    <img src="{{asset('images/BedBook/logo.png')}}" alt="logo" width="100px">
                </div>
                <div class="info" style="line-height: 18px; text-align: right; padding-top: 24px;">

                   <div style='font-size: 12pt;'><strong>{{$hos_info->hos_name}}</strong></div>
                        <div style='font-size: 10pt;'>&nbsp;{{$hos_info->hos_address}}</div>
                        <div style='line-height: 10px;'>{{$hos_info->hos_email}}</div>
                        <div style='font-size: 9pt;'>{{$hos_info->hos_district}}</div>
                        <div style='font-size: 9pt;'>{{$hos_info->hos_contactno}}</div>
                    </div>
                </div>
            </div>
        </header>
        <div class="line">
            <hr>
        </div>
        <div>
            <form method="post" class="form">
                @csrf
            <div class="input-box">
            <p class="warning">Your appointment at the hospital is automatically cancelled if you do not arrive within <b>four hours</b> of the booking time.</p>
            </div>
                <div class="input-box">
                    <label>Patient's First Name</label>
                    <input type="text" name="pnt_first_name" placeholder="Enter first name" required />
                    <label>Patient's Last Name</label>
                    <input type="text" name="pnt_last_name" placeholder="Enter last name" required />
                </div>
                <div class="gender-box">
                    <lable>Gender</lable>
                    <div class="gender-option">
                        <div class="gender">
                            <input type="radio" id="check-male" name="pnt_gender" value="male" checked />
                            <label for="check-male">
                                <pre>    male</pre>
                            </label>
                        </div>
                        <div class="gender">
                            <input type="radio" id="check-female" name="pnt_gender" value="female" />
                            <label for="check-female">
                                <pre>    Female</pre>
                            </label>
                        </div>
                        <!-- use strong password showing because of this -> starts here  -->
                        <div class="input-box" id="age">
                            <label>Age</label>
                            <input type="number" name="pnt_age" placeholder="Enter age" required />
                        </div>
                        <!-- use strong password showing because of this -> ends here  -->
                        <div class="column">
                            <div class="input-box">
                                <label>Phone Number</label>
                                <input type="number" name="pnt_contactno" placeholder="Enter phone number" required />
                            </div>
                            <div class="input-box">
                                <label>Birth Date</label>
                                <input type="date" name="pnt_dob" placeholder="Enter birth date" required />
                            </div>
                        </div>
                    </div>
                    <div class="input-box" id="age">
                            <label>Email address</label>
                            <input type="email" name="pnt_email" placeholder="Enter email address" required />
                        </div>
                    <div class="input-box" id="age">
                            <label>Aadhaar card</label>
                            <input type="number" name="pnt_adhr" placeholder="Enter aadhaar card number" required />
                        </div>
                </div>
                <div class="input-box address">
                    <label>Address</label>
                    <input type="text" name="pnt_address" placeholder="Enter street address" required />
                    <div class="column">
                        <div class="select-box">
                            <select name="pnt_district">
                                <option hidden>District</option>
                                <option>Alipurduar</option>
                                <option>Bankura</option>
                                <option>Birbhum</option>
                                <option>Cooch Behar</option>
                                <option>Dakshin Dinajpur</option>
                                <option>Darjeeling</option>
                                <option>Hooghly</option>
                                <option>Howrah</option>
                                <option>Jalpaiguri</option>
                                <option>Jhargram</option>
                                <option>Kalimpong</option>
                                <option>Kolkata</option>
                                <option>Malda</option>
                                <option>Murshidabad</option>
                                <option>Nadia</option>
                                <option>North 24 Parganas</option>
                                <option>Paschim Bardhaman</option>
                                <option>Paschim Medinipur</option>
                                <option>Purba Bardhaman</option>
                                <option>Purba Medinipur</option>
                                <option>Purulia</option>
                                <option>South 24 Parganas</option>
                                <option>Uttar Dinajpur</option>
                            </select>
                        </div>
                        <input type="text" name="pnt_city" placeholder="Enter your city" required />
                    </div>
                    <div class="column">
                        <input type="number" name="pnt_pincode" placeholder="Enter postal code" required />
                    </div>
                            <a href="{{route('store.data', ['id'])}}"><button type="submit" name="submit">Submit</button></a>
                        </div>
            </form>
        </div>
    </section>
</body>

</html>