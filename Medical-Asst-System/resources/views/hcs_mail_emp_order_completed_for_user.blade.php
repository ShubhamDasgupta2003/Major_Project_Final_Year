
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Service Booking Completed</title>
</head>
<body>
    <p>
        <strong>Subject:</strong> Completion of Your Healthcare Service Booking
    </p>

    <p>
        Dear {{ $userdata->name }},
    </p>

    <p>
        We are pleased to inform you that your recent healthcare service booking with [Your Company Name] has been successfully completed.
    </p>

    <p>
        Here are the details of your booking:
    </p>

    <ul>
        <li><strong>Service:</strong> {{ $userdata->order_type === 'A' ? 'Aya' : ($userdata->order_type === 'N' ? 'Nurse' : 'Technician') }}</li>
        <li><strong>Date & Time:</strong> {{ $userdata->created_at }}</li>
        <li><strong>Land Mark:</strong> {{ $userdata->land_mark }}</li>
        <li><strong>Location:</strong> {{ $userdata->address }}</li>
    </ul>

    <p>
        Employee Assigned: [Employee's Name] <br>
        Contact Number of Employee: [Employee's Contact Number] <br>
        Total Amount Paid: 500 <br>
        Payment Method: Online <br>
        OTP: {{ $userdata->otp }}
    </p>

    <p>
        Our employee has accepted your booking, and the service has been completed as scheduled.
    </p>

    <p>
        We hope our service met your expectations. If you have any feedback or need further assistance, please don't hesitate to contact us at emergencymedicalassistancesystem.healthcare@gmail.com.
    </p>

    <p>
        Thank you once again for choosing Emergency Medical Assistance System. We value your trust and look forward to serving you again in the future.
    </p>

    <p>
        Warm regards, <br>
        Emergency Medical Assistance System
    </p>
</body>
</html>
