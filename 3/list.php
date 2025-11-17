<?php
$students = ["Ram", "Sita", "Hari"];
echo "Initial students: " . implode(", ", $students) . "<br>";
array_push($students, "Gita", "Laxman");
echo "After adding: " . implode(", ", $students) . "<br>";
array_pop($students);
echo "After removing last: " . implode(", ", $students) . "<br>";
echo "Total students: " . count($students) . "<br>";
if (in_array("Ram", $students)) {
    echo "Ram is in the list";
} else {
    echo "Ram is not in the list";
}
?>