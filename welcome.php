<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      background-color: palevioletred;
      color: aliceblue;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      font-size: 40px;
    }
  </style>
</head>

<body>
  <h1>Welcome to Hello World</h1>
</body>
<form action="welcome.php" method="post">
  <input type="submit" value="logout" name="logout">
</form>

</html>
<?php
if (isset($_POST["logout"])) {
  session_destroy();
  header("location:session.php");
  exit();
}
