<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $comments = $_POST['comments'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Set email details
    $to = "info@cleanclothes.co.za";
    $subject = "New Contact Form Submission";
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-type: text/html\r\n";

    // Create email body
    $message = "<html><body>";
    $message .= "<h2>Contact Form Submission</h2>";
    $message .= "<p><strong>Name: </strong>" . $name . "</p>";
    $message .= "<p><strong>Email: </strong>" . $email . "</p>";
    $message .= "<p><strong>Phone: </strong>" . $phone . "</p>";
    $message .= "<p><strong>Message: </strong>" . $comments . "</p>";
    $message .= "</body></html>";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
} else {
    echo "Invalid request.";
}
?>
