<?php
session_start();
require_once "../database/db.php";

$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['pass'];
$cpassword = $_POST['cpass'];
$role = 'user';
$verification_status = 0;

//checking fields are not empty
if (!empty($email) && !empty($phone) && !empty($password) && !empty($cpassword) && !empty($role)) {
    //if email is valid
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //checking if email already exists
        $stmt = $pdo->prepare("SELECT email FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "$email  Already Exists";
        } else {
            //checking password and confirm password match
            if ($password === $cpassword) {
                $random_id = rand(time(), 10000000);
                $otp = mt_rand(1111, 9999);

                // Insert data into table
                $stmt2 = $pdo->prepare("INSERT INTO users (unique_id, email, phone, password, otp, verification_status, role)
                VALUES(:unique_id, :email, :phone, :password, :otp, :verification_status, :role)");
                $stmt2->bindParam(':unique_id', $random_id);
                $stmt2->bindParam(':email', $email);
                $stmt2->bindParam(':phone', $phone);
                $stmt2->bindParam(':password', $password);
                $stmt2->bindParam(':otp', $otp);
                $stmt2->bindParam(':verification_status', $verification_status);
                $stmt2->bindParam(':role', $role);
                $stmt2->execute();

                if ($stmt2) {
                    //Fetching inserted admin data
                    $stmt3 = $pdo->prepare("SELECT * FROM users WHERE email = :email");
                    $stmt3->bindParam(':email', $email);
                    $stmt3->execute();

                    if ($stmt3->rowCount()) {
                        $row = $stmt3->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['unique_id'] = $row['unique_id'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['otp'] = $row['otp'];

                        // Sending verification email
                        $receiver = $email;
                        $subject = "Verification Code";
                        $body = "Your verification code is: $otp";
                        $sender = "From: feelixbragais@gmail.com";

                        if (mail($receiver, $subject, $body, $sender)) {
                            echo "success";
                        } else {
                            echo "Something went wrong";
                        }
                    }
                } else {
                    echo "Something went wrong";
                }
            } else {
                echo "Confirm Password Doesn't Match";
            }
        }
    } else {
        echo "Invalid Email";
    }
} else {
    echo "All input fields are required";
}
?>