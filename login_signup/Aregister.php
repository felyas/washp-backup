<?php
include("php/authentication/authentication_admin.php");
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Account</title>
    <link rel="icon" href="images/Logo Washup White Version.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <a class="sidebar-brand " href="Aindex.php">
                    <div class="sidebar-brand-icon">
                        <img src="./images/Logo Washup White Version.png" class="img-fluid pe-2" alt="">
                    </div>
                    <div class="sidebar-brand-text">WashUp Admin</div>
                </a>
                
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link not-toggleble">
                            <div class="text-center">
                                <div class="name">
                                    <span style="color: white"><?php echo htmlspecialchars($email); ?></span>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p id="date" class="me-3" style="color: white"></p>
                                    <p id="time" style="color: white"></p>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="Aindex.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="Abookings.php" class="sidebar-link">
                            <i class="fa-solid fa-pen-to-square pe-2"></i>
                            Bookings Detail
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="Aprice.php" class="sidebar-link">
                            <i class="fa-solid fa-box pe-2"></i>
                            Upload Price
                        </a>
                    </li>
                    
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-regular fa-user pe-2"></i>
                            Accounts
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="Aregister.php" class="sidebar-link">Add New Account</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item d-none">
                        <a href="Aorder_summary.php" class="sidebar-link">
                            <i class="fa-solid fa-box pe-2"></i>
                            Booking Summary
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <i class="fa-solid fa-bars" style="color: var(--bs-light)"></i>
                </button>
                
                <div class="navbar-collapse navbar justify-content-end">
                    <div class="notification me-5">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                    <i class="fa-solid fa-bell notification-icon" style="color: var(--bs-light); font-size: 1.3rem;"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                    
                    <div class="">
                        <ul class="navbar-nav">
                            <li><a href="php/logout.php"><button class="logout_btn">LOG OUT</button></a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="content d-flex justify-content-center  px-3 py-2"> 
              <!-- align-items-center -->
                <div class="container-fluid w-100 mt-3">
                
                <div class="main-content" style="padding-top: 0px;">
                  
                    <div class="form">
                      <h2>Add New Account</h2>
                      <form action="register_admin2.php" method="POST">
                        <div class="error-text">Error</div>
                        <div class="grid-details">
                          <div class="input">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" id="fname" placeholder="First Name" required pattern="[a-zA-Z'-'\s]*" style="background-color: white; color:black">
                          </div>
                          <div class="input">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" placeholder="Last Name" required pattern="[a-zA-Z'-'\s]*" style="background-color: white; color:black">
                          </div>
                        </div>
                        <div class="input">
                          <label for="email">Email</label>
                          <input type="email" name="email" id="email" placeholder="Email" required style="background-color: white; color:black">
                        </div>
                        <div class="input">
                          <label for="phone">Phone Number</label>
                          <input type="tel" name="phone" id="phone" placeholder="Phone Number" required pattern="[0-9]{11}" oninvalid="this.setCustomValidity('Enter 11 Digits Number')" oninput="this.setCustomValidity('')" style="background-color: white; color:black">
                        </div>
                        <div class="input">
                          <label for="role">Role</label>
                          <select name="role" id="role" required>
                            <option value="admin">Admin</option>
                            <option value="delivery">Delivery Man</option>
                          </select style="background-color: white;">
                        </div>
                        <div class="grid-details">
                          <div class="input password">
                            <label for="pass">Password</label>
                            <input type="password" name="pass" id="pass" placeholder="Password" required style="background-color: white; color:black">
                          </div>
                          <div class="input">
                            <label for="cpass"></label>
                            <input type="password" name="cpass" id="cpass" placeholder="Confirm Password" required style="background-color: white; color:black">
                          </div>
                        </div>
                        <div class="submit">
                          <input type="submit" value="ADD" class="button">
                        </div>
                      </form>
                    </div>
                  
                </div>
                </div>
            </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/register_admin.js"></script>
</body>

</html>
