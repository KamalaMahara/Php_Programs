<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="validation.php" method="post">
    Username:
    <input type="text" name="name" id="name"><br>

    Age:
    <input type="text" name="age" id="age"><br>
    email:
    <input type="email" name="email" id="email"><br>
    <input type="submit" value="login" name="login"><br>

  </form>
</body>

</html>
<?php
// validation in php
if (isset($_POST["login"])) {
  $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);

  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  if (empty($age)) {
    echo "please enter a valid age";
  } else {
    echo "your age is: {$age} <br>";
  }
  echo "<br>";
  if (empty($email)) {
    echo "please enter a valid email";
  } else {
    echo "your email is: {$email} <br>";
  }
}
