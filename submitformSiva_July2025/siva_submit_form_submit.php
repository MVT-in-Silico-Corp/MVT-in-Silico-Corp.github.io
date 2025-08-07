<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

    // Validate input
    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid input. Please go back and try again.");
    }

    // OPTIONAL: Send email notification.
    $to = "sumus@mvtinsilico.ca"; // Replace with your actual email
    $subject = "New Signup from $name";
    $message = "Name: $name\nEmail: $email";
    $headers = "From: noreply@yourdomain.com";

    mail($to, $subject, $message, $headers);

    // Redirect or show success
    echo "Thank you for signing up!";
} else {
    die("Invalid request.");
}
?>


