<?php
echo "Hello world";
print "heloo";
print("3.12345678");   // ← added semicolon
$name = "Joen Doe";    // ← now no error
$number = 123;         // ← added semicolon
$isHome = true;
$isEmpty = null;
$file = fopen("tst.txt","w");
$names = ["john","John","john"];
print($name);
print($number);
print($isHome);
print($isEmpty);
print_r($file);        // better use print_r for resources
print_r($names);       // arrays need print_r to display properly
?>
