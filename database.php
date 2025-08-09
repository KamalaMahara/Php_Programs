<?php
// Database connection using mysqli with exception handling and connection checking

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Businessdb";

try {
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_errno) {
    throw new Exception("Connection failed: " . $conn->connect_error);
  }
  echo "Connection successful";
} catch (Exception $e) {
  echo $e->getMessage();
}
