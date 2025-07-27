<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>get post variables </title>
</head>

<body>
  <form action="get_post_variable.php " method="get">
    <label for="name">Username:</label><br>
    <input type="text" name="name" id="name">
    <br>
    <label for="pass">Password:</label><br>
    <input type="password" name="pass" id="pass">
    <br><br>
    <input type="submit" value="login">
  </form>

</body>

</html>
<?php

/* $_GET,$_POST = special variables used to collect data from an html form.data is sent to the file in the action attribute of <form> ,<form action="file name.php" method="get/post">

/*$_GET=  data is appended to the URL
         not secure
         can be bookmarked
         limited to 100 characters
         used to retrive data
         better for search queries
         */
/* $_POST *= data is packaged inside the body of the http request
         more secure
        no limit on the amount of data
        not bookmarked
        used to send data
        better for the sensitive data / login creditials
        */

echo " {$_GET["name"]} <br>";
echo $_GET["pass"];
?>