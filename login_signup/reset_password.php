<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link rel="stylesheet" href="css/form.css">
  <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
  <link rel="icon" href="../image/Logo Washup White Version.png" type="image/x-icon">
</head>
<body>
  <div id="header">
    <a class="logo" href="#"><img src="../image/Logo Washup White Version.png" alt=""></a>
  </div>
  <div class="main-content">
    <div class="form-container">
      <div class="form">
        <h2>Reset password</h2>
        <form action="php/reset_password.php" method="post" autocomplete="off">
          <div class="error-text">Error</div>
          <div class="input">
            <label for="pass">Password</label>
            <input type="password" name="pass" id="pass" placeholder="Password" required>
          </div>
          <div class="input">
            <label for="cpass"></label>
            <input type="password" name="cpass" id="cpass" placeholder="Confirm Password" required>
          </div>
          <div class="submit">
            <input type="submit" value="Login" class="button">
          </div>
        </form>
      </div>
    </div>
  </div>
  <div id="footer">
    © 2024 WashUp Laundry. All Rights Reserved.
  </div>
</body>
</html>