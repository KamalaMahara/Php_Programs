<?php
include('database.php');
$username = "sona sing";
$password = "level98";
$hash = password_hash($password, PASSWORD_BCRYPT);
$sql = "INSERT INTO users (username,password) 
        VALUES 
               ('prativa regmi','pra!12'),
               ('maya dhami','maya32'),
               ('$username','$hash')";
if (mysqli_query($conn, $sql)) {
  echo "Records inserted successfully.";
} else {
  echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
