<?php

$localhost = 'localhost';
$username = 'root';
$password = 'password';
$dbname = 'washupdb';

try {
  $pdo = new PDO("mysql:host=$localhost;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Successful";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}