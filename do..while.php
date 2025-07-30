<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>do while loop in php</title>
</head>

<body>
  <form action="do..while.php" method="post">
    <label for="n">Enter a number:</label>
    <input type="text" name="n" id="n">
    <input type="submit" value="hit">
  </form>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["n"]) && is_numeric($_POST["n"])) {
    $num = $_POST["n"];
    do {
      echo "Square of $num is " . pow($num, 2) . "<br>";
      // If you want to repeat, you can decrement or change $num here
      $num = 0; // Ending the loop after one run for demonstration
    } while ($num != 0);
  } else {
    echo "Please enter a valid number in the field first.";
  }
}
?>