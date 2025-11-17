<?php
$students = [
    ["name" => "Ram", "age" => 20, "faculty" => "BCA"],
    ["name" => "Sita", "age" => 19, "faculty" => "BIT"],
    ["name" => "Hari", "age" => 21, "faculty" => "BCA"]
];
for ($i = 0; $i < count($students); $i++) {
    echo "Student " . ($i + 1) . ": " . 
         $students[$i]["name"] . ", Age: " . 
         $students[$i]["age"] . ", Faculty: " . 
         $students[$i]["faculty"] . "<br>";
}
?>
