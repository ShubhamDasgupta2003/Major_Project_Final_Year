<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Service Booking Cancellation</title>
</head>
<body>
    <p>
        <strong>Subject:</strong> Cancellation of Your Healthcare Service Booking
    </p>

    <p>
        Dear {{ $userdata->name }},
    </p>

    <p>
        We have received your request to cancel your booking with [Your Company Name]. We regret any inconvenience this may cause.
    </p>

    <p>
        Below were the details of your booking:
    </p>

    <ul>
        <li><strong>Service:</strong> {{ $userdata->order_type === 'A' ? 'Aya' : ($userdata->order_type === 'N' ? 'Nurse' : 'Technician') }}</li>
        <li><strong>Date & Time:</strong> {{ $userdata->created_at }}</li>
        <li><strong>Land Mark:</strong> {{ $userdata->land_mark }}</li>
        <li><strong>Location:</strong> {{ $userdata->address }}</li>
        <!-- You can add more details here -->
    </ul>

    <p>
        If you have already made a payment, please allow [Time for Refund Process] for the refund to be processed. The refunded amount will be credited to your original payment method.
    </p>

    <p>
        If you have any further questions or concerns, please don't hesitate to contact us at [Your Contact Information].
    </p>

    <p>
        We appreciate your understanding and hope to serve you again in the future.
    </p>

    <p>
        Warm regards, <br>
        Emargency Medical Assistance System
    </p>
</body>
</html>
