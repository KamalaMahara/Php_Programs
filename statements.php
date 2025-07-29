<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>statements in php</title>
</head>

<body>
  <form action="statements.php" method="post">
    <label for="n">Number: </label>
    <input type="text" name="n" id="n">
    <input type="submit" value="check">
  </form>
</body>

</html>
<?php
$num = $_POST["n"];
if ($num > 0) {
  echo "the number is positive";
} else {
  echo "the number is negative";
}
?>