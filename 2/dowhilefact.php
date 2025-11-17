<?php
$num = 5; 
$factorial = 1;
$i = 1;
do {
    $factorial *= $i;
    $i++;
} while ($i <= $num);
echo "Factorial of $num is: $factorial";
?>