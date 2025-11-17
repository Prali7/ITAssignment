<?php
$num1 = 15.567;
$num2 = 7.234;
$n1 = round($num1, 2);
$n2 = round($num2, 2);
$add = $n1 + $n2;
$sub = $n1 - $n2;
$mul = $n1 * $n2;
$div = $n1 / $n2;
echo "Addition: $n1 + $n2 = " . number_format(abs($add), 2) . "<br>";
echo "Subtraction: $n1 - $n2 = " . number_format(abs($sub), 2) . "<br>";
echo "Multiplication: $n1 × $n2 = " . number_format(abs($mul), 2) . "<br>";
echo "Division: $n1 ÷ $n2 = " . number_format(abs($div), 2);
?>