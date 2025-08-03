<?php
$username = "Kamala Mahara";
$phone = "9876543210";
echo strtoupper($username) . "<br>";
echo strtolower($username) . "<br>";
echo trim($username) . "<br>";
echo str_replace("6", "1", $phone) . "<br>";
echo strrev($username) . "<br>";
echo str_shuffle($username) . "<br>"; //randomly shuffles the characters in the string
echo strcmp($username, "prativa regmi") . "<br>"; //
echo strlen($username) . "<br>";
