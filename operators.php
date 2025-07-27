<?php
//arithmetic operators
$a = 10;
$b = 20;
$sum = $a + $b;
$diff = $a - $b;
$prodct = $a * $b;
$div = $a / $b;
$mod = $a % $b;
$exp = $b ** $a;
echo "the sum is {$sum}<br>";
echo "the difference  is {$diff}<br>";
echo "the product is {$prodct}<br>";
echo "the division is {$div}<br>";
echo "the modulus is {$mod}<br>";
echo "the exponent is {$exp}<br>";

//unary operators
$a = 10;
$a++;
$a--;
echo $a;
echo "<br>";
//ternary operator
$age = 18;
$canvote = ($age >= 18) ? "can vote" : "no";
echo $canvote;
echo "<br>";
//assignment operators
$a = 10;
$a += 13;
$a -= 2;
$a *= 3;
$a /= 3;
$a % 4;
echo $a;
echo "<br>";

//comparison operators
$a = 10;
$b = 50;
echo ($a == $b) ? "is equal" : "isn't equal<br>";
echo ($a != $b) ? "isnt equal" : "is eqaul ";
echo "<br>";

echo ($a > $b) ? "a is greater" : "b is greater <br>";
echo ($a < $b) ? "a is smaller" : "b is smaller ";
echo "<br>";
echo ($a >= $b) ? "a is greater or equal" : "b is grater or equal <br>";
echo ($a <= $b) ? "a is smaller or equal " : "b is smaller or equal ";
echo "<br>";
echo ($a === $b) ? "a is identical to b" : "a is not identical to b <br>";
