<?php
include('database.php');

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (!$result) {
  die("Query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["Id"] . " | name: " . $row["username"] .   " | password:  " . $row["password"]   .  " |  registered date:" . $row["reg_date"] . "<br>";
  }
} else {
  echo "No results found.";
}

mysqli_close($conn);
