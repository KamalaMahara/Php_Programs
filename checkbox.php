<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="checkbox.php" method="post">
    <input type="checkbox" name="ch[]" value="Pizza">Pizza <br>
    <input type="checkbox" name="ch[]" value="Momo">Momo <br>
    <input type="checkbox" name="ch[]" value="Burger">Burger<br>
    <input type="checkbox" name="ch[]" value="Panipuri">Panipuri <br>
    <input type="checkbox" name="ch[]" value="Chatpatey">Chatpatey<br>
    <input type="submit" name="order" value=" Order Now!">
  </form>


</body>

</html>
<?php
if (isset($_POST["order"])) {
  if (isset($_POST["ch"])) {
    $foods = $_POST["ch"];
    echo "yoou ordered:<br>";
    foreach ($foods as $food) {
      echo "{$food} <br>";
    }
  } else {
    echo "select your fav foods";
  }
}
