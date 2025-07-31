<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="radio.php" method="post">
    <input type="radio" name="gender" id="gen" value="Male"> Male<br>
    <input type="radio" name="gender" id="gen" value="Female"> Female<br>
    <input type="radio" name="gender" id="gen" value="others"> others<br>
    <input type="submit" name="submit" value="submit">
  </form>
</body>

</html>
<?php
if (isset($_POST["submit"])) {
  if (isset($_POST["gender"])) {
    $people = $_POST["gender"];
    echo "your gender is :{$people}";
  } else {
    echo "please choose your gender ";
  }
}
