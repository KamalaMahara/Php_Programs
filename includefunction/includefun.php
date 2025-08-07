<?php
// include() = used to include a file in another file(php,html,text,etc)
// sections of our website become resuable
// changes onlu nneed to be made in one place
include("header.html");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  this is the home page.
</body>

</html>
<?php
include("about.html");
include("contact.html");
include("footer.html");
?>