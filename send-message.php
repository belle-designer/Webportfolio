<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = nl2br(htmlspecialchars($_POST['message'])); // Convert line breaks to <br>

    // Check for empty fields
    if (empty($name) || empty($email) || empty($message)) {
        echo "<script>document.getElementById('error-message').innerText = 'All fields are required.'; document.getElementById('error-message').style.display = 'block';</script>";
    } else {
        // Email to your address
        $to = "your-email@example.com"; // Replace with your email address
        $subject = "New Contact Form Message from $name";

        // Construct the email body
        $body = "
        <html>
        <head>
            <title>New Contact Form Message</title>
        </head>
        <body>
            <h2>Message from $name</h2>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong><br>$message</p>
        </body>
        </html>
        ";

        // Set email headers
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
        $headers .= "From: $email\r\n";  // Sender's email
        $headers .= "Reply-To: $email\r\n"; // Reply-to address

        // Validate the email address
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Send the email
            if (mail($to, $subject, $body, $headers)) {
                // Send a response to trigger the thank you message in the front-end
                echo "<script>showThankYouMessage();</script>";
            } else {
                echo "<script>document.getElementById('error-message').innerText = 'Failed to send your message. Please try again later.'; document.getElementById('error-message').style.display = 'block';</script>";
            }
        } else {
            echo "<script>document.getElementById('error-message').innerText = 'Invalid email address. Please check your email.'; document.getElementById('error-message').style.display = 'block';</script>";
        }
    }
}
?>
