<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="associativeArray.php" method="post">
    <label for="c">Enter a country </label>
    <input type="text" name="c" id="c">
    <input type="submit" value="ok">
  </form>
</body>

</html>


<?php
// associative array is an arrat made of "key" => "value" pairs.
$capital = array(
  'nepal' => 'ktm',
  "japan" => "tokyo",
  "south korea" => "seoul",
  "USA" => "washington dc"
);
$capitals = $capital[$_POST["c"]];

echo "the capital city is {$capitals} <br>";
//array functions
$capital["india"] = "new delhi";    // adds the new key value pair at the last of the array

array_pop($capital);              // removes the last element
array_shift($capital);        // removes the first element in the array
echo "the key elements are :<br>";
$keys = array_keys($capital);    //displays all the key elements 
foreach ($keys as $k) {
  echo "{$k} <br>";
}
$values = array_values($capital); // lists all the key elements
echo "the value  elements are:<br>";
foreach ($values as $val) {
  echo "{$val} <br>";
}
echo "all the key=> value elements are :<br>";
foreach ($capital as $key => $value) {

  echo "{$key} ={$value} <br>";
}
