<?php
$student = array(
    "name" => "Ram Sharma",
    "roll_number" => 25,
    "faculty" => "BCA",
    "semester" => 3,
    "email" => "ram.sharma@example.com"
);
echo "<h3>STUDENT PROFILE</h3>";
echo "Name: " . $student["name"] . "<br>";
echo "Roll Number: " . $student["roll_number"] . "<br>";
echo "Faculty: " . $student["faculty"] . "<br>";
echo "Semester: " . $student["semester"] . "<br>";
echo "Email: " . $student["email"];
?>
