<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $to      = "stravoelectric@outlook.com"; // CHANGE to your business email
    $headers = "From: " . $name . " <" . $email . ">\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $fullMessage = "You have received a new message from your website contact form.\n\n";
    $fullMessage .= "Name: $name\n";
    $fullMessage .= "Email: $email\n";
    $fullMessage .= "Subject: $subject\n";
    $fullMessage .= "Message:\n$message\n";

    if(mail($to, $subject, $fullMessage, $headers)) {
        echo "<h2>✅ Thank you! Your message has been sent successfully.</h2>";
    } else {
        echo "<h2>❌ Sorry, something went wrong. Please try again later.</h2>";
    }
}
?>
