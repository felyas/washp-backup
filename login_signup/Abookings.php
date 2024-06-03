<?php
include("php/authentication/authentication_admin.php");
?>

<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
    <link rel="icon" href="images/Logo Washup White Version.png" type="image/x-icon">

    <!--Bootstrap Framework CSS CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--Data Tables Library CDN-->

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/booking.css">
    <link rel="stylesheet" href="css/order_summary.css">
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
                                <div class="d-flex justify-content-center clock">
                                    <p id="date" class="me-3" style="color: white">May 27 2024</p>
                                    <p id="time" style="color: white">10:20:56</p>
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
                <div class="container-fluid">
                    <div class="addSection py-1">
                        <!-- Header Content -->
                        <div class="search-bar">
                            <div>
                                <input class="form-control bg-light text-dark mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search_text">
                            </div>

                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewCustomerModal">
                            Add Customer
                            </button> -->
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-lg-12">
                            <div id="showAlert"></div>
                        </div>
                    </div>

                    <div class="row py-1">
                        <div class="col-lg-12">
                            <div class="table-responsive" style="overflow-x: auto; overflow-y: auto; max-height: 400px; max-width: 100%;">
                                <table class="table table-bordered table-hover shadow" style="color: var(--clr-dark);">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Services</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Preference</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody id="tbody">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer id="footer">
                <p>Copyright © 2024 WashUp Laundry. All rights reserved.</p>
            </footer>
        </div>

        <!-- Modal for add Customer
            <div class="modal fade" id="addNewCustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                    </div>

                    <div class="modal-body">
                            <form id="addCustomerForm" class="" novalidate>
                                <div class="form-group">
                                    <div class="data-time d-flex">
                                        <div class="form-class mb-4 flex-grow-1 me-2">
                                            <label for="f_name" class="form-label">Date</label>
                                            <input type="text" name="date" class="form-control" required>
                                            <div class="invalid-feedback">Date is required.</div>
                                        </div>

                                        <div class="form-class mb-4 flex-grow-1 me-2">
                                            <label for="f_name" class="form-label">Time</label>
                                            <input type="text" name="date" class="form-control" required>
                                            <div class="invalid-feedback">Time is required.</div>
                                        </div>
                                    </div>


                                        

                                    
                                    <div class="dropdown mb-4">
                                        <select name="selectedService" id="selectedService" class="form-select w-100" required>
                                            <option value="" disabled selected>Select a service</option>
                                            <option value="Action">Action</option>
                                            <option value="Another action">Another action</option>
                                            <option value="Something else here">Something else here</option>
                                        </select>
                                    </div>

                                </div>
                            
                    
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" id="add-item-btn" value="Add">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->

        <!-- Modal for update -->
        <div class="modal" id="editStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white">Update Status</h5>

                        </button>
                    </div>

                    <div class="modal-body">
                        <form id="editStatusForm" class="p-2" novalidate>
                            <input type="hidden" name="id" id="id">

                            <div class="form-group">
                                <div class="form-class mb-4">
                                    <label for="f_name">Customer Last Name</label>
                                    <input type="text" name="lname" id="lname" class="form-control" readonly>
                                </div>

                                <div class="dropdown mb-4">
                                    <select name="selectedService" id="selectedService" class="form-select w-100" required>
                                        <option value="for pickup">For Pickup</option>
                                        <option value="on process">On Process</option>
                                        <option value="for delivery">For Delivery</option>
                                    </select>
                                </div>
                            </div>



                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" id="edit-status-btn" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for view summary -->
        <div class="modal" id="viewSummary" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: var(--clr-polynesian);">
                        <h5 class="modal-title text-white">Booking Details</h5>
                    </div>

                    <div class="modal-body" style="height: 450px;">
                        <div class="summary-content d-flex">
                            <div class="col-4 titles">
                                <div class="summary-details">Personal Details:</div>
                                <div class="summary-details">Pickup & Delivery Details:</div>
                            </div>
                            <div class="col-4">
                                <div class="summary-details">
                                    <p>First Name:</p>
                                    <p>Last Name:</p>
                                    <p>Phone Number:</p>
                                    <p>Email Address</p>
                                </div>
                                <div class="summary-details">
                                    <p>Address:</p>
                                    <p>Location Details:</p>
                                    <p>Shipping Method:</p>
                                    <p>Payment Method:</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="summary-details">
                                    <p id="firstname"></p>
                                    <p id="lastname"></p>
                                    <p id="phone_number"></p>
                                    <p id="email_address"></p>
                                </div>
                                <div class="summary-details">
                                    <p id="address"></p>
                                    <p id="landmarks"></p>
                                    <p id="shipping_method"></p>
                                    <p id="payment_method"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="js/script.js"></script>
    <script src="js/booking.js"></script>
</body>

</html>