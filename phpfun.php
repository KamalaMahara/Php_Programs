<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    login
  </title>
</head>
<style>
  #name,
  #password,
  #login {
    border-radius: 8px;
    border-color: #020d3bff;
    border-width: 3px;
    margin: 5px;
    font-weight: bold;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  }
</style>

<body>
  <form action="phpfun.php" method="post">

    <label for="name">Username:</label>
    <input type="text" name="name" id="name"><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <br>
    <input type="submit" id="login" name="login" value="Login">


  </form>
</body>

</html>
<?php
/* isset() = Returns TRUE if a variable is declared and not null
     empty() = Returns TRUE if a variable is not declared, false,null */

// $username = "hello";
// if (isset($username)) {
//   echo "this variable is set ";
// } else {
//   echo "this variable is not set";
// }
// echo "<br>";
// $num = null;
// if (empty($num)) {
//   echo "this variable is empty";
// } else {
//   echo "this variable is not empty";
// }

if (isset($_POST["login"])) {
  $username = $_POST["name"];
  $password = $_POST["password"];

  if (empty($username) && empty($password)) {
    echo "Username and password are required!";
  } elseif (empty($username)) {
    echo "Username is empty. Please fill it!";
  } elseif (empty($password)) {
    echo "Password is missing. Please fill it!";
  } else {
    echo "Welcome {$username}!";
  }
}
