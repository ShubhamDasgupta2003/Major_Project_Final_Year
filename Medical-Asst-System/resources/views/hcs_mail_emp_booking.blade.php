<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Service Booking Confirmation</title>
</head>
<body>
    <p>
        <strong>Subject:</strong> Confirmation of Your Healthcare Service Booking
    </p>

    <p>
        Dear {{ $userdata->name }},
    </p>

    <p>
        Thank you for choosing [Your Company Name] for your healthcare needs. We are delighted to confirm your recent booking for {{ $userdata->order_type === 'A' ? 'Aya' : ($userdata->order_type === 'N' ? 'Nurse' : 'Technician') }}.
    </p>

    <p>
        Below are the details of your booking:
    </p>

    <ul>
        <li><strong>Service:</strong> {{ $userdata->order_type === 'A' ? 'Aya' : ($userdata->order_type === 'N' ? 'Nurse' : 'Technician') }}</li>
        <li><strong>Date & Time:</strong> {{ $userdata->created_at }}</li>
        <li><strong>Land Mark:</strong> {{ $userdata->land_mark }}</li>
        <li><strong>Location:</strong> {{ $userdata->address }}</li>
        <!-- You can add more details here -->
    </ul>

    <p>
        Employee Assigned: [Employee's Name] <br>
        Contact Number of Employee: [Employee's Contact Number] <br>
        Total Amount Paid: 500 <br>
        Payment Method: Online <br>
        OTP: {{ $userdata->otp }}
    </p>

    <p>
        Your booking is currently pending acceptance by our employee. Once accepted, you will receive a confirmation notification.
    </p>

    <p>
        Please ensure that you are available at the specified location at least [Duration before Service] before the scheduled time. Your assigned {{ $userdata->order_type === 'A' ? 'Aya' : ($userdata->order_type === 'N' ? 'Nurse' : 'Technician') }} will arrive promptly to provide the necessary care and support.
    </p>

    <p>
        Should you have any questions or need further assistance, feel free to reach out to us at [Your Contact Information].
    </p>

    <p>
        Thank you for entrusting [Your Company Name] with your healthcare needs. We look forward to serving you.
    </p>

    <p>
        Warm regards, <br>
        Emargency Medical Assistance System
    </p>
</body>
</html>
