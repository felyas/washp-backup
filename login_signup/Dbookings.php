<?php
include("php/authentication/authentication_delivery.php");

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Dashboard</title>
    <link rel="icon" href="images/Logo Washup White Version.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/delivery.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <a class="sidebar-brand " href="Dindex.php">
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
                        <a href="Dindex.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="Dbookings.php" class="sidebar-link">
                            <i class="fa-solid fa-clipboard pe-2"></i>
                            Bookings Detail
                        </a>
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
                <div class="container-fluid w-75 mt-3">

                    <div class="column">
                      <div class="col-12 col-md-6 w-100 d-flex" style="color: #F7FAFC">
                          <div class="card bg-white flex-fill border-0 shadow">
                              <div class="card-body py-4">
                                  <div class="d-flex align-items-start">
                                      <div class="flex-grow-1">
                                          <div class="">
                                            <h2 class="mb-2 ml-4 p-2 text-black">
                                                Preview of Bookings
                                            </h2>
                                          </div>

                                          <div class="table-responsive mb-0 d-flex align-items-center " style="width: 100%">
                                                  <table class="table table-success" style="width: 100%">
                                                      <thead>
                                                          <tr>
                                                              <th>ID</th>
                                                              <th>Name</th>
                                                              <th>Address</th>
                                                              <th>Status</th>
                                                              <th>Action</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody id="tbody">
                                                          <tr>
                                                              <td>8</td>
                                                              <td>Justine Villa</td>
                                                              <td>Crossing, Calamba</td>
                                                              <td>On Process</td>
                                                              <th>
                                                                <div class="d-flex flex-column w-75 flex-sm-row justify-content-between">
                        
                                                                  <a href="#" id="'.$row['booking_id'].'" type="button" class="btn btn-success editLink mb-2 mb-sm-0 me-0 me-sm-2" data-bs-toggle="modal" data-bs-target="#editStatusModal"><i class="fa-solid fa-pen-to-square"></i></a>

                                                                  <a href="Aorder_summary.php?id="'.$row['booking_id'].'" class="btn btn-primary viewLink mb-2 mb-sm-0 me-0 me-sm-2"><i class="fa-regular fa-eye"></i></a>

                                                                  <a href="#" id="'.$row['booking_id'].'" class="btn btn-danger deleteLink"><i class="fa-solid fa-trash"></i></a>
                                                                </div>
                                                              </th>
                                                          </tr>
                                                          <tr>
                                                              <td>7</td>
                                                              <td>Menard Quimeda</td>
                                                              <td>Brgy. Kay Anlog, Calamba</td>
                                                              <td>For Pickup</td>
                                                              <td>
                                                                <div class="d-flex flex-column w-75 flex-sm-row justify-content-between">
                        
                                                                  <a href="#" id="'.$row['booking_id'].'" type="button" class="btn btn-success editLink mb-2 mb-sm-0 me-0 me-sm-2" data-bs-toggle="modal" data-bs-target="#editStatusModal"><i class="fa-solid fa-pen-to-square"></i></a>

                                                                  <a href="Aorder_summary.php?id="'.$row['booking_id'].'" class="btn btn-primary viewLink mb-2 mb-sm-0 me-0 me-sm-2"><i class="fa-regular fa-eye"></i></a>

                                                                  <a href="#" id="'.$row['booking_id'].'" class="btn btn-danger deleteLink"><i class="fa-solid fa-trash"></i></a>
                                                                </div>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td>6</td>
                                                              <td>Shakira Sarmiento</td>
                                                              <td>Brgy. San Juan, Calamba</td>
                                                              <td>For Delivery</td>
                                                              <td>
                                                                <div class="d-flex flex-column w-75 flex-sm-row justify-content-between">
                        
                                                                  <a href="#" id="'.$row['booking_id'].'" type="button" class="btn btn-success editLink mb-2 mb-sm-0 me-0 me-sm-2" data-bs-toggle="modal" data-bs-target="#editStatusModal"><i class="fa-solid fa-pen-to-square"></i></a>

                                                                  <a href="Aorder_summary.php?id="'.$row['booking_id'].'" class="btn btn-primary viewLink mb-2 mb-sm-0 me-0 me-sm-2"><i class="fa-regular fa-eye"></i></a>

                                                                  <a href="#" id="'.$row['booking_id'].'" class="btn btn-danger deleteLink"><i class="fa-solid fa-trash"></i></a>
                                                                </div>
                                                              </td>
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
            <!-- <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a> -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
