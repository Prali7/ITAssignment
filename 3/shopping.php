<?php
$items = [
    ["name" => "Laptop", "price" => 75000],
    ["name" => "Mouse", "price" => 500],
    ["name" => "Keyboard", "price" => 1200]
];
echo "<h3>SHOPPING BILL</h3>";
$subtotal = 0;
foreach ($items as $item) {
    $price = round($item["price"], 2);
    echo $item["name"] . ": Rs. " . number_format($price, 2) . "<br>";
    $subtotal += $price;
}
echo "----------------------------------<br>";
$vat = $subtotal * 0.13;
$total = $subtotal + $vat;
echo "Subtotal:  Rs. " . number_format($subtotal, 2) . "<br>";
echo "VAT (13%): Rs. " . number_format($vat, 2) . "<br>";
echo "---------------------------------<br>";
echo "<strong>TOTAL:     Rs. " . number_format($total, 2) . "</strong><br>";
echo "=========================";
?>
