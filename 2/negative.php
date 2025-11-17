<?php
$numbers = [3, 5, 7, -2, 8, 9, 10, 1, 4, 6]; 
$i = 0;
while ($i < 10) {
    if ($numbers[$i] < 0) {
        echo "Negative number found! Stopping the program.";
        break;
    }
    echo $numbers[$i] . "<br>";
    $i++;
}
?>