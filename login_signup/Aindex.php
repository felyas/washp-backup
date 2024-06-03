<?php
include("php/authentication/authentication_admin.php");
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" href="images/Logo Washup White Version.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <a class="sidebar-brand " href="Aindex.php">
                    <div class="sidebar-brand-icon">
                        <img src="./images//Logo Washup White Version.png" class="img-fluid pe-2" alt="">
                    </div>
                    <div class="sidebar-brand-text">WashUp Admin</div>
                </a>
                
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link not-toggleble">
                            <div class="text-center">
                                <div class="name">
                                    <span style="color: var(--clr-light)"><?php echo htmlspecialchars($email); ?></span>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <p id="date" class="me-3" style="color: var(--clr-light)"></p>
                                    <p id="time" style="color: var(--clr-light)"></p>
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
                                    <i class="fa-solid fa-bell notification-icon" style="color: var(--bs-light); "></i>
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
                <div class="container-fluid w-75 mt-3">
                    
                    <div class="row">
                      <div class="col-12 col-md-6 d-flex" style="color: #F7FAFC">
                            <div class="card flex-fill border-0 shadow">
                                <div class="card-body  py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h2 class="mb-2 ml-4 p-2">
                                                <span>127</span>
                                            </h2>
                                            
                                            <div class="new mb-0 d-flex align-items-center">
                                              <i class="fa-solid fa-clock me-2"></i>
                                              <p class="mb-0">
                                                New Bookings
                                              </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 d-flex" style="color: #F7FAFC">
                          <div class="card flex-fill border-0 shadow">
                                <div class="card-body  py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h2 class="mb-2 ml-4 p-2 text-black">
                                              <span>13</span>
                                            </h2>
                                            
                                            <div class="completed mb-0 d-flex align-items-center">
                                              <i class="fa-solid fa-circle-check me-2"></i>
                                              <p class="mb-0">
                                                Completed Bookings
                                              </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                      <div class="col-12 col-md-6 w-100 d-flex" style="color: #F7FAFC">
                          <div class="card flex-fill border-0 shadow">
                              <div class="card-body py-4">
                                  <div class="d-flex align-items-start">
                                      <div class="flex-grow-1">
                                          <div class="preview pickup">
                                            <h2 class="mb-2 ml-4 p-2">
                                                Preview of for Pickup
                                            </h2>
                                          </div>

                                          <div class="table-responsive mb-0 d-flex align-items-center " style="width: 100%">
                                                  <table class="table" style="color: var(--clr-dark);">
                                                      <thead>
                                                          <tr>
                                                              <th>ID</th>
                                                              <th>Name</th>
                                                              <th>Services</th>
                                                              <th>Preference</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody id="tbody">
                                                          <tr>
                                                              <td>8</td>
                                                              <td>Justine Villa</td>
                                                              <td>Wash, Dry, Press</td>
                                                              <td>2-days Standard(Free)</td>
                                                          </tr>
                                                          <tr>
                                                              <td>7</td>
                                                              <td>Menard Quimeda</td>
                                                              <td>Wash, Dry, Fold</td>
                                                              <td>Rush</td>
                                                          </tr>
                                                          <tr>
                                                              <td>6</td>
                                                              <td>Shakira Sarmiento</td>
                                                              <td>Dry Clean</td>
                                                              <td>2-days Standard(Free)</td>
                                                          </tr>
                                                      </tbody>
                                                  </table>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="column">
                      <div class="col-12 col-md-6 w-100 d-flex" style="color: #F7FAFC">
                          <div class="card flex-fill border-0 shadow">
                              <div class="card-body py-4">
                                  <div class="d-flex align-items-start">
                                      <div class="flex-grow-1">
                                          <div class="preview process">
                                            <h2 class="mb-2 ml-4 p-2">
                                                Preview of on Process
                                            </h2>
                                          </div>

                                          <div class="table-responsive mb-0 d-flex align-items-center " style="width: 100%">
                                                  <table class="table" style="color: var(--clr-dark);">
                                                      <thead>
                                                          <tr>
                                                              <th>ID</th>
                                                              <th>Name</th>
                                                              <th>Services</th>
                                                              <th>Preference</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody id="tbody">
                                                          <tr>
                                                              <td>8</td>
                                                              <td>Justine Villa</td>
                                                              <td>Wash, Dry, Press</td>
                                                              <td>2-days Standard(Free)</td>
                                                          </tr>
                                                          <tr>
                                                              <td>7</td>
                                                              <td>Menard Quimeda</td>
                                                              <td>Wash, Dry, Fold</td>
                                                              <td>Rush</td>
                                                          </tr>
                                                          <tr>
                                                              <td>6</td>
                                                              <td>Shakira Sarmiento</td>
                                                              <td>Dry Clean</td>
                                                              <td>2-days Standard(Free)</td>
                                                          </tr>
                                                      </tbody>
                                                  </table>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="column">
                      <div class="col-12 col-md-6 w-100 d-flex" style="color: #F7FAFC">
                          <div class="card flex-fill border-0 shadow">
                              <div class="card-body py-4">
                                  <div class="d-flex align-items-start">
                                      <div class="flex-grow-1">
                                          <div class="preview delivery">
                                            <h2 class="mb-2 ml-4 p-2">
                                                Preview of for Delivery
                                            </h2>
                                          </div>

                                          <div class="table-responsive mb-0 d-flex align-items-center " style="width: 100%">
                                                  <table class="table" style="color: var(--clr-dark);">
                                                      <thead>
                                                          <tr>
                                                              <th>ID</th>
                                                              <th>Name</th>
                                                              <th>Services</th>
                                                              <th>Preference</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody id="tbody">
                                                          <tr>
                                                              <td>8</td>
                                                              <td>Justine Villa</td>
                                                              <td>Wash, Dry, Press</td>
                                                              <td>2-days Standard(Free)</td>
                                                          </tr>
                                                          <tr>
                                                              <td>7</td>
                                                              <td>Menard Quimeda</td>
                                                              <td>Wash, Dry, Fold</td>
                                                              <td>Rush</td>
                                                          </tr>
                                                          <tr>
                                                              <td>6</td>
                                                              <td>Shakira Sarmiento</td>
                                                              <td>Dry Clean</td>
                                                              <td>2-days Standard(Free)</td>
                                                          </tr>
                                                      </tbody>
                                                  </table>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>


                </div>
            </main>
            <footer id="footer">
                <p>Copyright © 2024 WashUp Laundry. All rights reserved.</p>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
