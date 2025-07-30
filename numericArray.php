<?php
//numeric index array
$animal = array("cat", "dog", "elephant", "tiger", "wolf");

// array functions
array_push($animal, "goat", "cow");   // adding elements to the end of the array
array_pop($animal);     //removes the last element in the array
array_shift($animal);    //removes the first element in the aaray
array_unshift($animal, "meowww"); //adds an element to the beginning of the array

echo $animal[0] . "<br>";
for ($i = 1; $i < count($animal); $i++) {
  echo $animal[$i] . "<br>";
}
