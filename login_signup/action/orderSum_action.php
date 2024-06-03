<?php

include("../database/db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM booking WHERE booking_id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id' => $id]);
  $result = $stmt->fetch();
  echo json_encode($result);
}