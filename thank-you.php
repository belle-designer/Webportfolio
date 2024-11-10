<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f7f7f7;
        }
        .thank-you-message {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .refresh-button {
            font-size: 18px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .refresh-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="thank-you-message">
        <h1>Thank you for your message!</h1>
        <p>Your message has been successfully sent. We will get back to you as soon as possible.</p>
    </div>

    <button class="refresh-button" onclick="window.location.reload();">Refresh Page</button>

</body>
</html>
