<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
</head>

<body>
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h2>Registration Form</h2>
    <label for="name">Username:</label><br>
    <input type="text" name="name" id="name"><br>
    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password"><br>
    <label for="email">Email</label><br>
    <input type="email" name="email" id="email"><br><br>
    <input type="submit" value="Register" name="submit">
  </form>


</body>

</html>
<?php
mysqli_close($conn);
?>