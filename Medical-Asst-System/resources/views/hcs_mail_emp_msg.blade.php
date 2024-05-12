<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Service Booking Confirmation</title>
</head>
<body>
    <p>
        <strong>Subject:</strong> Your order request accepted by our employee and they have sent you a message. Please read it carefully.
    </p>

    <p>
        Dear {{ $userdata->name }},
    </p>

    <p>
        Thank you for choosing EAMS for your healthcare needs. We are delighted to confirm your recent booking for {{ $userdata->order_type === 'A' ? 'Aya' : ($userdata->order_type === 'N' ? 'Nurse' : 'Technician') }}.
    </p>

    <p>
        <strong>Message:</strong><br>
        {{$msg}}
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
