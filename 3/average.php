<?php
function calculateAverage(...$marks) {
    $total = array_sum($marks);      
    $count = count($marks);          
    $average = $total / $count;      
    return round($average, 2);      
}
echo "Average of (80, 90, 70) = " . calculateAverage(80, 90, 70) . "<br>";
echo "Average of (60, 75, 85, 95) = " . calculateAverage(60, 75, 85, 95) . "<br>";
echo "Average of (100, 95) = " . calculateAverage(100, 95) . "<br>";
?>