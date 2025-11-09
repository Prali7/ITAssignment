<?php
$prices = [
    "Amazon" => 5000,
    "Flipkart" => 4500,
    "eBay" => 4800,
    "Snapdeal" => 5200
];
echo "<h3>PRICE COMPARISON</h3>";
foreach ($prices as $seller => $price) {
    echo $seller . ": Rs. " . number_format($price) . "<br>";
}
$highestPrice = max($prices);
$lowestPrice = min($prices);
$averagePrice = array_sum($prices) / count($prices);
$highestSeller = array_search($highestPrice, $prices);
$lowestSeller = array_search($lowestPrice, $prices);
$savings = $highestPrice - $lowestPrice;
echo "<br><strong>Statistics:</strong><br>";
echo "Highest Price: Rs. " . number_format($highestPrice) . " (" . $highestSeller . ")<br>";
echo "Lowest Price: Rs. " . number_format($lowestPrice) . " (" . $lowestSeller . ")<br>";
echo "Average Price: Rs. " . number_format($averagePrice) . "<br>";
echo "Savings: Rs. " . number_format($savings) . " (if you buy from " . $lowestSeller . ")<br>";
asort($prices);
echo "<br><strong>Sorted by Price (Low to High):</strong><br>";
foreach ($prices as $seller => $price) {
    echo $seller . ": Rs. " . number_format($price) . "<br>";
}
?>