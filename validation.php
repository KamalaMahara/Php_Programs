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
//sanitize  validation in php
if (isset($_POST["login"])) {
  $name = filter_input(
    INPUT_POST,
    "name",
    FILTER_SANITIZE_SPECIAL_CHARS // this will remove special characters
  );
  $age = filter_input(INPUT_POST, "age", FILTER_SANITIZE_NUMBER_INT); // this will remove all the characters except numbers)
  $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL); // this will remove all the characters except email format

  // if we want to validate the inputs we can use the  validation filters
  echo $age . "<br>";
  echo $email . "<br>";
  echo $name . "<br>";
}
