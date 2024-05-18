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

<p>We regret to inform you that your recent blood booking order could not be approved due to incomplete details provided. We apologize for any inconvenience this may have caused.</p>

<p>It seems that the information provided did not meet the requirements for processing your order. Specifically, the quantity of blood requested may not have been fulfilled due to insufficient details.</p>

<p>We understand the importance of your blood requirements, and we strive to ensure a seamless and efficient booking process for all our customers.</p>

<p>If you have any questions or concerns regarding your order or need further assistance in placing a new order, please feel free to contact us. Our team is here to assist you in any way we can.</p>

<p>Thank you for considering <strong>Medilities</strong>. Your bank will credit the amount you paid within three business days..</p>

<p>Best regards,</p>
<p>Medilities</p>

</body>
</html>