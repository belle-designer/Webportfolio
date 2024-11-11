<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form inputs to prevent XSS and ensure valid data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Server-side validation (basic)
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required!";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }

    // Set up the email details
    $to = "bc.ricamauy.zaldivia@cvsu.edu.ph";  // Replace with your email address
    $subject = "New Contact Form Submission from: $name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";  // Ensure proper character encoding

    // Compose the email body
    $body = "You have received a new message from your contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message";

    // Send the email using PHP mail function
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Sorry, there was an error sending your message.";
    }
}
?>
