<?php
include("database/db.php");
$email = $_SESSION['email'];

// check if user is logged in
if (!isset($_SESSION['unique_id']) || empty($_SESSION['unique_id'])) {
    header("location: login.php");
    exit();
}

// check if user is verified
$unique_id = $_SESSION['unique_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE unique_id = :unique_id");
$stmt->bindParam(':unique_id', $unique_id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $_SESSION['verification_status'] = $row['verification_status'];
        if ($row['verification_status'] !== 'verified') {
            header("location: verify.php");
            exit();
        }
        // Check if the role is 'user'
        if ($row['role'] !== 'user') {
            header("location: login.php"); 
            exit();
        }
    }
} else {
    // If no rows are returned, the user does not exist, so redirect to login
    header("location: login.php");
    exit();
}