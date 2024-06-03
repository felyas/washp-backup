<?php
session_start();
include("../database/db.php");

$email = $_POST['email'];
$password = $_POST['pass'];

if (!empty($email) && !empty($password)) {
    // Check in users table
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user_result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user_result) {
        $_SESSION['unique_id'] = $user_result['unique_id'];
        $_SESSION['email'] = $user_result['email'];
        echo "success_user";
        exit();
    }

    // Check in admin table
    $stmt = $pdo->prepare("SELECT * FROM admin WHERE email = :email AND password = :password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $admin_result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin_result) {
        $_SESSION['unique_id'] = $admin_result['unique_id'];
        $_SESSION['email'] = $admin_result['email'];
        $_SESSION['role'] = $admin_result['role'];

        if ($admin_result['role'] === 'admin') {
            echo "success_admin";
        } elseif ($admin_result['role'] === 'delivery') {
            try {
                echo "success_delivery";
            } catch (PDOException $e) {
                echo("Error: " . $e->getMessage());
            }
        }
        exit();
    }

    echo "Email or Password is Incorrect";
} else {
    echo "All fields are required.";
}
?>
