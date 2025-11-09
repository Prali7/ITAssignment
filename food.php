<?php
$favFoods = array("Pizza", "Momo", "Pasta", "Burger", "Ice Cream");
echo "My Favorite Foods:<br>";
$number = 1;
foreach ($favFoods as $food) {
    echo $number . ". " . $food . "<br>";
    $number++;
}
?>
