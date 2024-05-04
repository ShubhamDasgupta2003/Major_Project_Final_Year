
<pre>
Subject: Confirmation of Your Healthcare Service Booking

Dear {{$userdata->name}},

Thank you for choosing [Your Company Name] for your healthcare needs. We are delighted to confirm your recent booking for [Aya/Nurse/Other Service].

Below are the details of your booking:

Service: @if ($userdata->order_type == "A"){{"Aya"}};
@elseif($userdata->order_type == "N"){{"Nurse"}};
@else{{"Technician"}};
@endif
Date & Time: {{$userdata->created_at}}
Land Mark: {{$userdata->land_mark}}
Location: {{$userdata->address}}
Employee Assigned: [Employee's Name]
Contact Number of Employee: [Employee's Contact Number]
Total Amount Paid: 500
Payment Method: Online
OTP: {{$userdata->otp}}

Please ensure that you are available at the specified location at least [Duration before Service] before the scheduled time. Your assigned [Aya/Nurse/Other Service] will arrive promptly to provide the necessary care and support.

Should you have any questions or need further assistance, feel free to reach out to us at [Your Contact Information].

Thank you for entrusting [Your Company Name] with your healthcare needs. We look forward to serving you.

Warm regards,

Emargency Medical Assistance System
</pre>