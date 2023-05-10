<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  // Validate form data
  if (empty($name) || empty($email) || empty($message)) {
    // Required fields are missing
    header("Location: error.php");
    exit;
  }

  // Set the recipient email address
  $to = "risr759@gmail.com";

  // Set the email subject
  $subject = "New message from contact form";

  // Set the email message
  $body = "Name: $name\nEmail: $email\nMessage: $message";

  // Set the email headers
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "X-Mailer: PHP/".phpversion();

  // Send the email
  if (mail($to, $subject, $body, $headers)) {
    // Email sent successfully
    header("Location: thank-you.php");
    exit;
  } else {
    // Email sending failed
    header("Location: error.php");
    exit;
  }
}
?>