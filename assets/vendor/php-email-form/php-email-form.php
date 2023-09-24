<?php
// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace with your receiving email address
    $to = 'ahmadadra28@gmail.com';

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create email headers
    $headers = 'From: ' . $email . "\r\n" .
               'Reply-To: ' . $email . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Compose the email message
    $email_message = "Name: " . $name . "\n";
    $email_message .= "Email: " . $email . "\n";
    $email_message .= "Subject: " . $subject . "\n";
    $email_message .= "Message:\n" . $message;

    // Send the email
    if (mail($to, $subject, $email_message, $headers)) {
        // Email sent successfully
        echo "Success: Your message has been sent!";
    } else {
        // Email sending failed
        echo "Error: Oops! Something went wrong, and we couldn't send your message.";
    }
} else {
    // If the form was not submitted, redirect or display an error message
    echo "Error: Form submission is invalid.";
}
?>