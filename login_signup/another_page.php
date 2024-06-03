<?php

//if user verified so don't show the verify page
session_start();
include("database/db.php");
$unique_id = $_SESSION['unique_id'];
$email = $_SESSION['email'];
if (empty($unique_id)) {
    header("location: login.php");
}
$stmt = $pdo->prepare("SELECT * FROM users WHERE unique_id = :unique_id");
$stmt->bindParam(':unique_id', $unique_id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $_SESSION['verification_status'] = $row['verification_status'];
        if ($row['verification_status'] !== 'verified') {
            header("location: verify.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home page</title>
  <link rel="stylesheet" href="css/homepage.css">
</head>
<body>
<header id="header">

<a href="" class="logo"><h1>LOGO</h1></a>
<div class="email_logout">
<div class="email">
    <span style="color: #F7FAFC;"><?php echo $email?></span>
</div>
<div class="logout">
    <nav class="navigation">
        <li><a href="php/logout.php?logout_id=<?php echo "$unique_id" ?>"><button class="logout_btn">LOG OUT</button></a></li>
    </nav>
</div>
</div>


</header>

<section style="height:100vh;">

</section>
<footer id="footer">
<p>Copyright © 2024 WashUp Laund. All rights reserved.</p>
</footer>
</body>
</html>