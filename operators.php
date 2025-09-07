<?php
//(a): Arithmetic Operators
$num1 = 20;
$num2 = 6;
echo "Number 1 = $num1<br>";
echo "Number 2 = $num2<br><br>";
echo "Sum: " . ($num1 + $num2) . "<br>";
echo "Difference: " . ($num1 - $num2) . "<br>";
echo "Product: " . ($num1 * $num2) . "<br>";
echo "Division: " . ($num1 / $num2) . "<br>";
echo "Modulus: " . ($num1 % $num2) . "<br><br>";

//(b): Assignment Operators
$x = 10;
echo "value: $x<br>";
$x += 5;   
echo "After += 5: $x<br>";
$x -= 3;   
echo "After -= 3: $x<br>";
$x *= 2;   
echo "After *= 2: $x<br>";
$x /= 4;   
echo "After /= 4: $x<br>";
$x %= 3;   
echo "After %= 3: $x<br><br>";

//(c): Logical Operators
$number = 42;

if ($number >= 1 && $number <= 100 && $number % 2 == 0) {
    echo "$number is between 1 and 100 and even.<br>";
} else {
    echo "$number does not meet the condition.<br>";
}
if ($number < 1 || $number > 100) {
    echo "$number is outside the range 1–100.<br>";
}
if (!($number % 2 == 0)) {
    echo "$number is odd.<br>";
}

?>
