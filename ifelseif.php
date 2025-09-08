<?php
$marks = 72;
if ($marks >= 80 && $marks <= 100) {
    echo "Distinction";
} elseif ($marks >= 60 && $marks < 80) {
    echo "First Division";
} elseif ($marks >= 45 && $marks < 60) {
    echo "Second Division";
} elseif ($marks >= 30 && $marks < 45) {
    echo "Fail";
} else {
    echo "Invalid Marks Entered!";
}
?>
