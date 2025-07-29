<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>switch statements in php</title>
</head>

<body>
  <form action="switch.php" method="post">
    <label for="ch">Enter your choice : </label>
    <input type="text" name="ch" id="ch" placeholder="enter choice in number 1,2,3">
    <input type="submit" value="okay">
  </form>
</body>

</html>
<?php
$choice = $_POST["ch"];
switch ($choice) {
  case 1:
    echo "its sunday <br>";
    break;
  case 2:
    echo "its monday <br>";
    break;
  case 2:
    echo "its Tuesday <br>";
    break;
  case 2:
    echo "its Wednesday <br>";
    break;
  case 2:
    echo "its thursday <br>";
    break;
  case 2:
    echo "its Friday <br>";
    break;
  case 2:
    echo "its Saturday <br>";
    break;
  default:
    echo "please enter the valid choice <br>";
    break;
}
