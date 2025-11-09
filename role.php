<?php
function createProfile($name, $role = "student", $status = "active") {
    echo "Name: $name<br>";
    echo "Role: $role<br>";
    echo "Status: $status<br><br>";
}
createProfile("Ram Sharma");                      
createProfile("Sita Rai", "Teacher");            
createProfile("Hari Thapa", "Admin", "Inactive"); 
?>
