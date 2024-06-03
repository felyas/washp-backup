<?php
session_start();
session_unset();
session_destroy();
header("location: ../login.php");

// // if user is not logged in, redirect to login page
// if (!isset($_SESSION['unique_id'])) {
//     header("location: ../login.php");
//     exit();
// }

// // log out the user
// $logout_id = $_GET['logout_id'] ?? '';
// if (!empty($logout_id)) {
//     $stmt = $pdo->prepare("UPDATE users SET unique_id = '' WHERE unique_id = :logout_id");
//     $stmt->bindParam(':logout_id', $logout_id);
//     $stmt->execute();

//     // destroy all sessions
    
//     session_unset();
//     session_destroy();

//     // redirect to login page
//     header("location: ../login.php");
//     exit();
// } else {
//     // if logout_id is not provided, destroy all sessions and redirect to login page
//     session_unset();
//     session_destroy();

//     header("location: ../login.php");
//     exit();
// }

?>