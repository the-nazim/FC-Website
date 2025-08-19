<?php

// --- CONFIGURATION ---
// It's a good practice to keep configuration variables at the top.
$recipient_email = "nazim.dev06@gmail.com"; // <-- The email address that receives the form submissions.
$email_subject_prefix = "New Contact Form Submission";
// --- END CONFIGURATION ---

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize form data to prevent security vulnerabilities
    $name = htmlspecialchars(trim($_POST["name"]), ENT_QUOTES, 'UTF-8');
    $visitor_email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mobile = htmlspecialchars(trim($_POST["mobile"]), ENT_QUOTES, 'UTF-8');
    $subject = htmlspecialchars(trim($_POST["subject"]), ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars(trim($_POST["message"]), ENT_QUOTES, 'UTF-8');

    // Basic validation to ensure required fields are not empty
    if (empty($name) || empty($visitor_email) || empty($subject) || empty($message) || !filter_var($visitor_email, FILTER_VALIDATE_EMAIL)) {
        // If validation fails, send an error response
        http_response_code(400);
        echo "Please fill out all fields and provide a valid email address.";
        exit;
    }

    // Construct the email content
    $email_subject = $email_subject_prefix . ": " . $subject;
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $visitor_email\n";
    $email_body .= "Mobile: $mobile\n\n";
    $email_body .= "Message:\n$message\n";

    // Construct the email headers
    $headers = "From: $name <$visitor_email>\r\n";
    $headers .= "Reply-To: $visitor_email\r\n";

    // Send the email using PHP's mail() function
    if (mail($recipient_email, $email_subject, $email_body, $headers)) {
        // If the email is sent successfully, redirect to a success page or show a success message.
        // For a better user experience, you could create a simple thank-you.html page.
        header("Location: contact-us.html?status=success");
    } else {
        // If mail() fails, redirect back with an error status
        // This is often due to local server configuration not being set up to send mail.
        header("Location: contact-us.html?status=error");
    }
} else {
    // If the request method is not POST, deny access
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>
