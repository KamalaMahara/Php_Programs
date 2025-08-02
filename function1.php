<?php
function  processMarks($marks)
{
  $sum = 0;
  foreach ($marks as $mark) {
    $sum += $mark;
  }
  return $sum;
}
$kmla = [40, 50, 50, 59, 58, 59];
$prativa = [40, 50, 45, 55, 43, 44, 34];


echo "the total marks obtained by kmla in 2nd sem is :" . processMarks($kmla);
echo "<br>";
echo "the total marks obtained by prativa in 2nd sem is :" . processMarks($prativa);
