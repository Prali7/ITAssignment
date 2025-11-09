<?php
echo "<h3>OTP Generator</h3>";
for ($i = 1; $i <= 4; $i++) {
    $otp = rand(100000, 999999); 
    echo "OTP $i: " . $otp . "<br>";
}
?>