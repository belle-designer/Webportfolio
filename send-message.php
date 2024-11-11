<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = nl2br(htmlspecialchars($_POST['message']));  // Convert line breaks to <br>

    // Check if any required fields are empty
    if (empty($name) || empty($email) || empty($message)) {
        // Error: Missing fields
        echo "<script>document.getElementById('error-message').innerText = 'All fields are required.'; document.getElementById('error-message').style.display = 'block';</script>";
    } else {
        // Your email address (where you receive the messages)
        $to = "ricamayzaldivia@gmail.com"; // Replace with your email address
        $subject = "New Contact Form Message from $name";
        
        // Construct the email body (HTML format)
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

        // Set headers for the email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
        $headers .= "From: $email\r\n";  // Sender's email address
        $headers .= "Reply-To: $email\r\n"; // Reply-to address (user's email)

        // Validate email address
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Send the email to the website owner
            if (mail($to, $subject, $body, $headers)) {
                // Prepare the reply email to send back to the user
                $reply_subject = "Thank you for contacting us, $name!";
                $reply_body = "
                <html>
                <head>
                    <title>Thank You for Contacting Us</title>
                </head>
                <body>
                    <h2>Hi $name,</h2>
                    <p>Thank you for reaching out to us! We have received the following message from you:</p>
                    <p><strong>Your Message:</strong><br>$message</p>
                    <p>We will get back to you as soon as possible. If you have any further questions, feel free to reply to this email.</p>
                    <p>Best regards,<br>Your Company Name</p>
                </body>
                </html>
                ";

                // Set headers for the reply email
                $reply_headers = "MIME-Version: 1.0" . "\r\n";
                $reply_headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
                $reply_headers .= "From: ricamayzaldivia@gmail.com\r\n";  // Use your email to send the reply
                $reply_headers .= "Reply-To: your-email@example.com\r\n"; // Reply-to address (you can set this to your email or allow the user to reply to their own email)

                // Send the reply to the user
                if (mail($email, $reply_subject, $reply_body, $reply_headers)) {
                    // Redirect to thank-you page after successful submission
                    header("Location: thank-you.php");
                    exit(); // Ensure no further code is executed
                } else {
                    echo "<script>document.getElementById('error-message').innerText = 'Failed to send confirmation email. Please try again later.'; document.getElementById('error-message').style.display = 'block';</script>";
                }
            } else {
                echo "<script>document.getElementById('error-message').innerText = 'Failed to send your message. Please try again later.'; document.getElementById('error-message').style.display = 'block';</script>";
            }
        } else {
            echo "<script>document.getElementById('error-message').innerText = 'Please enter a valid email address.'; document.getElementById('error-message').style.display = 'block';</script>";
        }
    }
}
?>
