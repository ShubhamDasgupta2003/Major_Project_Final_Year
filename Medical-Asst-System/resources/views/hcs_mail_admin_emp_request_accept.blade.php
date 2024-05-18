<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Application Accepted</title>
</head>
<body>
    <p>
        <strong>Subject:</strong> Congratulations! Your Employee Application Has Been Accepted
    </p>

    <p>
        Dear {{$empdata->emp_name}},
    </p>

    <p>
        We are pleased to inform you that your application to become an employee of our company has been accepted!
    </p>

    <p>
        Below are your login details:
    </p>

    <ul>
        <li><strong>Email:</strong> {{$empdata->emp_email}}</li>
        <li><strong>Password:</strong> {{$empdata->password}}</li>
    </ul>

    <p>
        You can now access your account using the following link:<a href="http://127.0.0.1:8000/login">Login</a> 
    </p>

    <p>
        We appreciate your interest in joining our family and look forward to working with you.
    </p>

    <p>
        Warm regards, <br>
        Emergency Medical Assistance System
    </p>
</body>
</html>
