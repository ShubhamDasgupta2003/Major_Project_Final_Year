<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>{{ $mailData['title']}}</h2>

<p>Dear {{ $mailData['order']->pat_name }},</p>

<p>Thank you for choosing <strong>Medilities</strong> for your blood needs. We are pleased to confirm your blood booking order with the following details:</p>

<ul>
    <li><strong>Order ID:</strong> {{ $mailData['order']->order_id }}</li>
    <li><strong>Blood Group:</strong> {{ $mailData['order']->blood_gr }}</li>
    <li><strong>Quantity:</strong> {{ $mailData['order']->quantity }}</li>
    <li><strong>Delivery Address:</strong> {{ $mailData['order']->address }}</li>
</ul>

<p>We understand the critical importance of timely and safe delivery, and our team is committed to ensuring that your order is handled with the utmost care and efficiency. You can expect your blood delivery to arrive at your specified location shortly.</p>

<h3>What to Expect Next:</h3>
<ul>
    <li>Our team will process your order promptly.</li>
    <li>You will receive an update once your order is out for delivery.</li>
</ul>

<p>If you have any questions or need further assistance, please do not hesitate to contact us at [Contact Information].</p>

<p>Thank you for your trust in <strong>Medilities</strong>. Your satisfaction is our top priority, and we are here to support you every step of the way.</p>

<p>Best regards,</p>
<p>Medilities</p>

</body>
</html>