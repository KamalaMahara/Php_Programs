<?php
include("fakebookdb.php");

$username = "";
$email = "";
$username_error = "";
$email_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

  if (empty($username) || empty($password) || empty($email)) {
    $username_error = "Please fill all the fields";
  } else {
    // Check if username exists
    $check_sql = "SELECT * FROM users WHERE NAME = '$username'";
    $check_result = mysqli_query($conn, $check_sql);
    if (mysqli_num_rows($check_result) > 0) {
      $username_error = "Username is taken, try another username.";
    } else {
      // Check if email exists
      $check_email_sql = "SELECT * FROM users WHERE EMAIL = '$email'";
      $check_email_result = mysqli_query($conn, $check_email_sql);
      if (mysqli_num_rows($check_email_result) > 0) {
        $email_error = "Email is taken, try another email.";
      } else {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (NAME, PASSWORD, EMAIL) VALUES ('$username', '$hash', '$email')";
        if (mysqli_query($conn, $sql)) {
          echo "Registration successful!";
          // Optionally clear the form values
          $username = "";
          $email = "";
        } else {
          $username_error = "Error: " . mysqli_error($conn);
        }
      }
    }
    mysqli_close($conn);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
</head>

<body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h2>Registration Form</h2>
    <label for="name">Username:</label><br>
    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($username); ?>" <?php if ($username_error) echo 'autofocus'; ?>>
    <span style="color:red;"><?php echo $username_error; ?></span><br>
    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password"><br>
    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" <?php if ($email_error) echo 'autofocus'; ?>>
    <span style="color:red;"><?php echo $email_error; ?></span><br><br>
    <input type="submit" value="Register" name="submit">
  </form>
</body>

</html>