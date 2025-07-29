<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>statements in php</title>
</head>

<body>
  <form action="statements.php" method="post">
    <label for="n1">Number 1 : </label>
    <input type="text" name="n1" id="n1">

    <input type="submit" value="check">
  </form>
</body>

</html>
<?php
$num = $_POST["n1"];
if ($num > 0) {
  echo "the number is positive";
} else {
  echo "the number is negative";
}
?>