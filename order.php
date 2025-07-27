<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order page </title>
</head>

<body>
  <form action="order.php" method="post">
    <label for="q">Quantity:</label>
    <input type="text" name="q" id="q"> <br><br>
    <label for="p">Price:</label>
    <input type="text" name="p" id="p"> <br><br>
    <input type="submit" value="order now">
  </form>
</body>

</html>
<?php
$quantity = $_POST['q'];
$price = $_POST['p'];
$total = $quantity * $price;
echo "you have ordered $quantity items at price $price each <br>";
echo "your total amount is $total <br>";
echo "thank you for your order!";
?>