<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="math.php" method="post">
    <label for="val">X:</label>
    <input type="text" name="val" id="val"><br>
    <label for="val1">Y:</label>
    <input type="text" name="val1" id="val1"><br>
    <input type="submit" value="total">
  </form>
  <br>
  <form action="math.php" method="post">
    <label for="r">Radius:</label>
    <input type="text" name="r" id="r" placeholder="enter the radius of a circle"> <br>
    <input type="submit" value="calculate">
  </form>
</body>

</html>
<?php
/* $x = $_POST["val"];
$y = $_POST["val1"];
$total = null;
math functions

$total = abs($x);
$total = round($x);
$total = floor($x);
$total = ceil($x);
$total = sqrt($x);
$total = pow($x, $y);
$total = max($x, $y);
$total = min($x, $y);
$total = round(pi(), 3);
$total = rand(1000, 7100);
echo $total;*/

$r = $_POST["r"];
$area = null;
$circum = null;

$area = round(pi() * pow($r, 2), 2);
echo "the area of circle is :{$area} <br>";

$circum = round(2 * pi() * $r, 2);
echo "the circumference  of circle is :{$circum} <br>";
?>