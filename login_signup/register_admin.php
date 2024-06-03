<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Admin</title>
  <link rel="stylesheet" href="css/form.css">
</head>
<body>
  <div id="header">
    <a class="logo" href="#"><img class="logo" src="../image/Logo Washup White Version.png" alt=""></a>
    <!-- Add other header elements here -->
  </div>
  <div class="main-content">
    <div class="form-container">
      <div class="form">
        <h2>Signup form</h2>
        <form action="register_admin2.php" method="POST">
          <div class="error-text">Error</div>
          <div class="grid-details">
            <div class="input">
              <label for="fname">First Name</label>
              <input type="text" name="fname" id="fname" placeholder="First Name" required pattern="[a-zA-Z'-'\s]*">
            </div>
            <div class="input">
              <label for="lname">Last Name</label>
              <input type="text" name="lname" id="lname" placeholder="Last Name" required pattern="[a-zA-Z'-'\s]*">
            </div>
          </div>
          <div class="input">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" required>
          </div>
          <div class="input">
            <label for="phone">Phone Number</label>
            <input type="tel" name="phone" id="phone" placeholder="Phone Number" required pattern="[0-9]{11}" oninvalid="this.setCustomValidity('Enter 11 Digits Number')" oninput="this.setCustomValidity('')">
          </div>
          <div class="input">
            <label for="role">Role</label>
            <select name="role" id="role" required>
              <option value="admin">Admin</option>
              <option value="delivery">Delivery Man</option>
            </select>
          </div>
          <div class="grid-details">
            <div class="input">
              <label for="pass">Password</label>
              <input type="password" name="pass" id="pass" placeholder="Password" required>
            </div>
            <div class="input">
              <label for="cpass">Confirm Password</label>
              <input type="password" name="cpass" id="cpass" placeholder="Confirm Password" required>
            </div>
          </div>
          <div class="submit">
            <input type="submit" value="Signup Now" class="button">
          </div>
        </form>
        <div class="link">Already signed up? <a href="login.php">Login Now</a></div>
      </div>
    </div>
  </div>
  <div id="footer">
    © 2024 WashUp Laundry. All Rights Reserved.
  </div>
  <script src="js/register_admin.js"></script>
</body>
</html>
