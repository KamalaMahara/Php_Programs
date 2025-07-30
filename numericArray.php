<?php
//numeric index array
$animal = array("cat", "dog", "elephant", "tiger", "wolf");
echo $animal[0] . "<br>";
for ($i = 1; $i < count($animal); $i++) {
  echo $animal[$i] . "<br>";
}
