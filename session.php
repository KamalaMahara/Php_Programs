<?php
//session = its super global variable used to store information about the user to be used scross multiple pages.A user is assigned a unique session id when they first visit the site. eg: login,logout etc.
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="session.php" method="post">
    username: <input type="text" name="username" id="username" placeholder="enter your name"><br><br>
    Password:<input type="password" name="password" id="password" placeholder="enter your password"><br>
    <input type="submit" value="login" name=" login">

  </form>
</body>

</html>
<?php
if (isset($_POST["login"])) {
  if (!empty($_POST["username"] && !empty($_POST["password"]))) {
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];
    header("location:welcome.php");
  }
} else {
  echo "please enter your username and password";
  exit();
}
