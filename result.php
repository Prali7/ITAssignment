<?php
$marks = [
    "Internet Technology" => 85,
    "Data Structure" => 78,
    "Database" => 92,
    "Java Programming" => 88
];

echo "<h3>MARK SHEET</h3>";
$total = 0;
foreach ($marks as $subject => $mark) {
    echo $subject . ": " . $mark . "<br>";
    $total += $mark;
}

echo "----------------------<br>";
$totalSubjects = count($marks);
$average = $total / $totalSubjects;
$percentage = $average; 
if ($percentage >= 80) {
    $grade = "A";
} elseif ($percentage >= 60) {
    $grade = "B";
} elseif ($percentage >= 40) {
    $grade = "C";
} else {
    $grade = "F";
}
echo "Total Marks: " . $total . "<br>";
echo "Average: " . number_format($average, 2) . "<br>";
echo "Percentage: " . number_format($percentage, 2) . "%<br>";
echo "Grade: " . $grade;
?>
