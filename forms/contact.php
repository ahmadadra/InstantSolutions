<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace with your receiving email address
    $recipient_email = 'instantsolutionrecruitment@gmail.com';

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0; // Set to 2 for debugging
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'instantsolutionrecruitment@gmail.com'; // Your Gmail email address
        $mail->Password = 'Rayadarwich2017'; // Your Gmail app password
        $mail->SMTPSecure = 'ssl'; // Enable TLS encryption
        $mail->Port = 465; // TCP port to connect to

        // Recipients
        $mail->setFrom($email, $name); // Sender's name and email address
        $mail->addAddress($recipient_email); // Recipient's email address

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Send the email
        $mail->send();

        // Set a success message
        echo 'Success: Your message has been sent. Thank you!';
    } catch (Exception $e) {
        // Handle errors
        echo "Error: Oops! Something went wrong. {$mail->ErrorInfo}";
    }
} else {
    // If the form was not submitted, display an error message
    echo "Error: Form submission is invalid.";
}
?>