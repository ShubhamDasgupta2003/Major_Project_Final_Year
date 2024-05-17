<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Message Sender</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f0f0f0;
    }
    .container {
        max-width: 400px;
        width: 100%;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .input-group {
        margin-bottom: 20px;
    }
    .input-group label {
        display: block;
        margin-bottom: 5px;
    }
    .input-group input[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .input-group input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Send a Message(like how much time you need to come)</h2>
    
    <form action="" method="post">
    @csrf
        <div class="input-group">
        <label for="message">Message:</label>
        <input type="text" id="message" name="msg" required>
        </div>
        <div class="input-group">
            <input type="submit" value="Send Message">
        </div>
    </form>
    <div id="messageDisplay"></div>
</div>

</body>
</html>
