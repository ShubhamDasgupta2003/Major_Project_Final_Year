<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Registration</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    p {
        font-size: 18px;
        line-height: 1.6;
    }
    button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    button:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Family</h1>
        <p>Your request for employment in our family has been submitted. Please wait for a few days for its verification process. Once verified, you will become a valued member of our family.</p>
        <button onclick="redirectToHomepage()">Go to Homepage</button>
    </div>

    <script>
        function redirectToHomepage() {
            // Redirect to homepage
            window.location.href = "/"; // Replace "https://example.com" with your actual homepage URL
        }
    </script>
</body>
</html>
