<?php
//hashing= transforming sensitive data (password) into letters,numbers, or symbols via a hashing algorithm(similar to encryption ,hides the original data from 3rd parties)
$pass = "@!13km";
$hash = password_hash($pass, PASSWORD_DEFAULT); // hashing the password using the default algorithm
if (password_verify($pass, $hash))  // verifying the password agaiinst the hash
{
  echo "logged in successfully";
} else {
  echo "invalid password";
}
