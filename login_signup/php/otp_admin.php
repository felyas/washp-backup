<?php
session_start();
include ("../database/db.php");

$otp1 = $_POST['otp1'];
$otp2 = $_POST['otp2'];
$otp3 = $_POST['otp3'];
$otp4 = $_POST['otp4'];
$unique_id = $_SESSION['unique_id'];
$session_otp = $_SESSION['otp'];
$otp = $otp1.$otp2.$otp3.$otp4;

// Check if the OTP is being retrieved correctly from the session
//var_dump($_SESSION); //very useful hays!

if (!empty($otp)) {
    if (strcasecmp($otp, $session_otp) === 0) { // case-insensitive comparison
        $stmt = $pdo->prepare("SELECT * FROM admin WHERE unique_id = :unique_id AND otp = :otp");
        $stmt->bindParam(':unique_id', $unique_id);
        $stmt->bindParam(':otp', $otp);
        $stmt->execute();

        if ($stmt->rowCount() > 0) { //if unique_id and otp match
            $null_otp = 0;
            $stmt2 = $pdo->prepare("UPDATE admin SET `verification_status`= 'verified', `otp` = :null_otp WHERE unique_id = :unique_id");
            $stmt2->bindParam(':unique_id', $unique_id);
            $stmt2->bindParam(':null_otp', $null_otp);
            $stmt2->execute();

            if ($stmt2) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    $_SESSION['unique_id'] = $row['unique_id'];
                    $_SESSION['verification_status'] = $row['verification_status'];
                    echo "success";
                }
            }
        }
    } else {
        echo "Wrong otp\n";
    }
} else {
    echo "Enter otp\n";
}