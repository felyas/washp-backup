<?php
session_start();
require_once "../database/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email format
        $_SESSION['error'] = "Invalid email format";
        header("Location: forgot_password.php");
        exit();
    }

    // Check if email exists in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() == 0) {
        // Email does not exist
        $_SESSION['error'] = "Email not found";
        header("Location: forgot_password.php");
        exit();
    }

    // Generate a unique token
    $token = bin2hex(random_bytes(32));

    // Store the token in the database
    $stmt = $pdo->prepare("UPDATE users SET reset_token = :token WHERE email = :email");
    $stmt->bindParam(':token', $token);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Send email with a link to reset_password.php including the token
    $reset_link = "http://localhost/washUp/login_signup/reset_password.php?token=" . $token;
    $subject = "Password Reset";
    $message = "Click the link below to reset your password:\n\n$reset_link";
    $headers = "From: feelixbragais@gmail.com";

    if (mail($email, $subject, $message, $headers)) {
        $_SESSION['success'] = "Password reset instructions sent to your email";
        header("Location: ../forgot_password.php");
        exit();
    } else {
        $_SESSION['error'] = "Failed to send reset instructions. Please try again later.";
        header("Location: forgot_password.php");
        exit();
    }
}
