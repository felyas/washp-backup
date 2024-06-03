<?php

//if user verified so don't show the verify page
session_start();
include("database/db.php");
$unique_id = $_SESSION['unique_id'];
if (empty($unique_id)) {
    header("location: login.php");
}
$stmt = $pdo->prepare("SELECT * FROM admin WHERE unique_id = :unique_id");
$stmt->bindParam(':unique_id', $unique_id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $_SESSION['verification_status'] = $row['verification_status'];
        if ($row['verification_status'] === 'verified') {
            header("Location: admin_dashboard.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verify</title>
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="css/verify.css">
</head>
<body>
  <div class="form">
    <h2>Verify Your Account</h2>
    <p>An OTP has been sent to your email. Please check your inbox and enter the code to proceed.</p>
    <form action="" autocomplete="off">
      <div class="error-text">Error</div>
      <div class="fields-input">
        <input type="number" class="otp-field" name="otp1" placeholder="0" min="0" max="9" required onpaste="false">
        <input type="number" class="otp-field" name="otp2" placeholder="0" min="0" max="9" required onpaste="false">
        <input type="number" class="otp-field" name="otp3" placeholder="0" min="0" max="9" required onpaste="false">
        <input type="number" class="otp-field" name="otp4" placeholder="0" min="0" max="9" required onpaste="false">
      </div>

      <div class="submit">
        <input type="submit" value="Verify" class="button">
      </div>
    </form>
  </div>

  <script src="js/verify_admin.js"></script>
</body>
</html>