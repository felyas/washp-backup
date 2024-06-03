<?php
include("../database/db.php");
include("util.php");

$util = new Util;

// Handle fetch all items Ajax Request
if (isset($_GET['read'])) {
  $output = '';
  $sql = "SELECT * FROM booking";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if ($result) {
    foreach ($result as $row) {
      $fullName = $row['fname'] . ' ' . $row['lname'];
      $output .= '<tr>
                  <td>' . $row['booking_id'] . '</td>
                  <td>' . $fullName . '</td>
                  <td>' . $row['services'] . '</td>
                  <td>' . $row['phone'] . '</td> 
                  <td>' . $row['address'] . '</td>
                  <td>' . $row['shipping_method'] . '</td>
                  <td>' . $row['status'] . '</td>

                  <td>
                    <div class="d-flex flex-column w-75 flex-sm-row justify-content-between">
                      
                      <a href="#" id="' . $row['booking_id'] . '" type="button" class="btn btn-success editLink mb-2 mb-sm-0 me-0 me-sm-2" data-bs-toggle="modal" data-bs-target="#editStatusModal"><i class="fa-solid fa-pen-to-square"></i></a>

                      <a href="#" id="' . $row['booking_id'] . '" type="button" class="btn btn-primary viewLink mb-2 mb-sm-0 me-0 me-sm-2" data-bs-toggle="modal" data-bs-target="#viewSummary"><i class="fa-regular fa-eye"></i></a>

                      <a href="#" id="' . $row['booking_id'] . '" class="btn btn-danger deleteLink"><i class="fa-solid fa-trash"></i></a>
                    </div>
                  </td>

                </tr>';
    }
    echo $output;
  } else {
    echo '<tr>
            <td colspan="8">No Data</td>
          </tr>';
  }
}




// Handle Update Item Ajax Request
if (isset($_GET['edit'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM booking WHERE booking_id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id' => $id]);
  $result = $stmt->fetch();
  echo json_encode($result);
}


if (isset($_POST['update'])) {
  $id = $util->testInput($_POST['id']);
  $lname = $util->testInput($_POST['lname']);
  $status = $util->testInput($_POST['selectedService']);

  $sql = "UPDATE booking SET status = :status WHERE booking_id = :id";
  $stmt = $pdo->prepare($sql);
  $result = $stmt->execute([
    'id' => $id,
    'status' => $status
  ]);

  if ($result) {
    echo $util->showMessage('success', 'Status updated successfully');
  } else {
    echo $util->showMessage('danger', 'Something went wrong');
  }
}
