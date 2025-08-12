<?php
// Database connection using mysqli with exception handling and connection checking

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Fakebookdb";

try {
  // Connect without specifying the database
  $conn = new mysqli($servername, $username, $password);

  if ($conn->connect_errno) {
    throw new Exception("Connection failed: " . $conn->connect_error);
  }

  // Create database if it doesn't exist
  $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
  if ($conn->query($sql)) {
    echo "Database created successfully";
  } else {
    echo "Error creating database: " . $conn->error;
  }

  // Selecting the database
  $conn->select_db($dbname);

  // Create table
  $sql = "CREATE TABLE IF NOT EXISTS users (
    ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    NAME VARCHAR(30) NOT NULL,
    PASSWORD VARCHAR(255) NOT NULL,
    EMAIL VARCHAR(50) NOT NULL,
    CREATED_AT TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
  if ($conn->query($sql)) {
    echo "Table created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
} catch (Exception $e) {
  echo $e->getMessage();
}
