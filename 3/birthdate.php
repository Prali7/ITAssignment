<?php
$birthdate = "2000-05-15";
$birthDateObj = new DateTime($birthdate);
$currentDateObj = new DateTime(); 
$age = $currentDateObj->diff($birthDateObj)->y;
echo "Birthdate: " . $birthDateObj->format("F d, Y") . "<br>";
echo "Current Date: " . $currentDateObj->format("F d, Y") . "<br>";
echo "Age: " . $age . " years old";
?>