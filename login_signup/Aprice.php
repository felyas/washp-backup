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
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-regular fa-user pe-2"></i>
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

                    <div class="column">
                        <div class="col-12 col-md-6 w-100 d-flex" style="color: #F7FAFC">
                            <div class="card bg-white flex-fill border-0 shadow">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <div class="">
                                                <h2 class="mb-2 ml-4 p-2 text-black">
                                                    List of Bookings
                                                </h2>
                                            </div>

                                            <div class="table-responsive mb-0 d-flex align-items-center " style="width: 100%">
                                                <table class="table " style="color: var(--clr-dark);">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Name</th>
                                                            <th>Services</th>
                                                            <th>Preference</th>
                                                            <th>Price</th>
                                                            <th>Send</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody">
                                                        <tr>
                                                            <td>8</td>
                                                            <td>Justine Villa</td>
                                                            <td>Wash, Dry, Press</td>
                                                            <td>2-days Standard(Free)</td>
                                                            <td>Null</td>
                                                            <td>
                                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#sendPrice">
                                                                    <i class="fa-solid fa-paper-plane" style="color: white"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>Menard Quimeda</td>
                                                            <td>Wash, Dry, Fold</td>
                                                            <td>Rush</td>
                                                            <td>Null</td>
                                                            <td>
                                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#sendPrice">
                                                                    <i class="fa-solid fa-paper-plane" style="color: white"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Shakira Sarmiento</td>
                                                            <td>Dry Clean</td>
                                                            <td>2-days Standard(Free)</td>
                                                            <td>Null</td>
                                                            <td>
                                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#sendPrice">
                                                                    <i class="fa-solid fa-paper-plane" style="color: white"></i>
                                                                </button>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>5</td>
                                                            <td>Angelo Serenuela</td>
                                                            <td>Dry Clean</td>
                                                            <td>2-days Standard(Free)</td>
                                                            <td>Null</td>
                                                            <td>
                                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#sendPrice">
                                                                    <i class="fa-solid fa-paper-plane" style="color: white"></i>
                                                                </button>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>4</td>
                                                            <td>Charles Ignacio</td>
                                                            <td>Wash, Dry, Fold</td>
                                                            <td>2-days Standard(Free)</td>
                                                            <td>Null</td>
                                                            <td>
                                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#sendPrice">
                                                                    <i class="fa-solid fa-paper-plane" style="color: white"></i>
                                                                </button>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>3</td>
                                                            <td>Jemma Mendez</td>
                                                            <td>Dry Clean</td>
                                                            <td>Rush</td>
                                                            <td>Null</td>
                                                            <td>
                                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#sendPrice">
                                                                    <i class="fa-solid fa-paper-plane" style="color: white"></i>
                                                                </button>
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
            <footer id="footer">
                <p>Copyright © 2024 WashUp Laundry. All rights reserved.</p>
            </footer>
        </div>
    </div>


    <!-- Modal for to send image -->
    <div class="modal fade" id="sendPrice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-white">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Send Proof of Price</h5>
                </div>
                <div class="modal-body">
                    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="formFile" class="form-label text-black">Please choose an image to upload</label>
                            <input class="form-control bg-white text-black" type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                        </div>
                        <div class="form-group" style="margin-top:20px; text-align:right">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success btn-block" id="image" name="image" value="SEND">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>