<?php
// Sanitize and get form data
$name = htmlspecialchars(trim($_POST["name"]));
$email = htmlspecialchars(trim($_POST["email"]));
$message = htmlspecialchars(trim($_POST["message"]));

// Your email address (where you want to receive the form submissions)
$to = "yourname@example.com";  // Replace with your actual email address

// Email subject for the message sent to you
$subject_for_you = "New Contact Form Submission from $name";

// Message body for the email sent to you (the website owner)
$body_for_you = "You have received a new message from the contact form on your website.\n\n".
                "Name: $name\n".
                "Email: $email\n".
                "Message:\n$message\n";

// Email headers for the message sent to you
$headers_for_you = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();

// Send the email to you (website owner)
if (mail($to, $subject_for_you, $body_for_you, $headers_for_you)) {
    // Send a confirmation email to the user (the one who submitted the form)

    // Email subject for the confirmation email sent to the user
    $subject_for_user = "Thank you for contacting us, $name!";

    // Message body for the email sent to the user
    $body_for_user = "Hi $name,\n\n".
                     "Thank you for reaching out to us. We have received your message and will get back to you shortly.\n\n".
                     "Here is a copy of your message:\n$message\n\n".
                     "Best regards,\nYour Website Team";

    // Email headers for the confirmation email sent to the user
    $headers_for_user = "From: yourname@example.com" . "\r\n" .  // Replace with your email address
                        "Reply-To: yourname@example.com" . "\r\n" .
                        "X-Mailer: PHP/" . phpversion();

    // Send the confirmation email to the user
    if (mail($email, $subject_for_user, $body_for_user, $headers_for_user)) {
        echo "Thank you for your message! We will get back to you shortly.";
    } else {
        echo "We encountered an issue while sending the confirmation email. Please try again later.";
    }
} else {
    echo "Oops! Something went wrong and we couldn't send your message. Please try again later.";
}
?>
