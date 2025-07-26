<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>php programs</title>
</head>

<body>
  <?php
  //string variables
  $name = "kamala mahara";
  $email = "kmlamahara@gmil.com";


  $age = 19; //integer variable
  $gpa = 3.96; // float variable
  $cost = 10000.987;

  //boolean variables
  $isonline = false;
  $isstudent = true;

  $price = 2000;
  $quantity = 20;
  $total = $price * $quantity;
  echo "the total price is \${$total}<br>";
  echo "hello my name is {$name} and im {$age} years old now <br>";

  echo "my email is {$email}<br>";
  echo "my gpa is {$gpa}<br>";
  echo "my course cost is \${$cost}<br>"; // using \ to escape the dollar sign in cost
  echo "is online:{$isonline}<br>";
  echo "is online:{$isstudent}<br>";
  ?>

</body>

</html>