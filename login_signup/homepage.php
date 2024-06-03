<?php
session_start();
include("./php/authentication/authentication_users.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home page</title>
  <link rel="stylesheet" href="css/homepage.css">
  <link rel="icon" href="../image/Logo Washup White Version.png" type="image/x-icon">
</head>
<body>
  <header id="header">
    <a href="" class="logo"><h1>LOGO</h1></a>
    <div class="email_logout">
      <div class="email">
        <span style="color: #F7FAFC;"><?php echo htmlspecialchars($email); ?></span>
      </div>
      <div class="logout">
        <nav class="navigation">
          <li><a href="php/logout.php"><button class="logout_btn">LOG OUT</button></a></li>
        </nav>
      </div>
    </div>
  </header>
  
  <section style="height:100vh;">
    <h2>Welcome: <span><?php echo htmlspecialchars($email); ?></span></h2>
    <a href="another_page.php">Click me</a>
  </section>
  <footer id="footer">
    <p>Copyright © 2024 WashUp Laundry. All rights reserved.</p>
  </footer>
</body>
</html>
