<?php
function factorial(int $number)
{
  $fact = 1;
  for ($i = 1; $i <= $number; $i++) {
    $fact *= $i;
  }
  return $fact;
}

echo factorial(5); // Outputs 120