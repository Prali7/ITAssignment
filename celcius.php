<?php
function celsiusToFahrenheit($celsius) {
    $fahrenheit = ($celsius * 9/5) + 32;
    return $fahrenheit;
}
echo "0°C = " . celsiusToFahrenheit(0) . "°F<br>";
echo "25°C = " . celsiusToFahrenheit(25) . "°F<br>";
echo "100°C = " . celsiusToFahrenheit(100) . "°F<br>";
?>
