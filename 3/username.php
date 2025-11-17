<?php
$username = "  Ram123  ";
$username = trim($username);
$length = strlen($username);
echo "Username: " . $username . "<br>";
echo "Length: " . $length . " characters<br>";
if ($length < 5) {
    echo "Username is too short! (Minimum 5 characters required)";
} elseif ($length > 15) {
    echo "Username is too long! (Maximum 15 characters allowed)";
} else {
    echo "Username is valid (5-15 characters)";
}
?>
