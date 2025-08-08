<?php
//cookie =information about a user stored in a user's web browser targeted ads,browsing preferences,and other non-sensitive data

/*set a cookie
setcookie(name,value,expire,path,domain,secure); */
setcookie("username", "kamala mahara", time() + 86400, "/", "", true); // 86400 seconds *2 =  this cookie expires after 2 days

setcookie("password", "123!@()", time() + 86400 * 2, "/", "", true); // 86400 seconds *2 =  this cookie expires after 2 days

foreach ($_COOKIE as $key => $value) {
  echo "$key:$value <br>";
}

if (isset($_COOKIE["username"]) && !empty($_COOKIE["password"])) {
  echo "welcome {$_COOKIE["username"]} <br>";
} else {
  echo "welcome as a guest <br>";
}
