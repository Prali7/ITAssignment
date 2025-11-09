<?php
$email = "RAM.Sharma@EXAMPLE.com";
echo "Original: " . $email . "<br>";
$cleanedEmail = strtolower(trim($email));
echo "Cleaned: " . $cleanedEmail . "<br>";
if (strpos($cleanedEmail, "@") !== false) {
    echo "Valid email format<br>";
    $parts = explode("@", $cleanedEmail);
    $username = $parts[0];
    $domain = $parts[1];
    echo "Username: " . $username . "<br>";
    echo "Domain: " . $domain;
} else {
    echo "Invalid email format (missing @ symbol)";
}
?>