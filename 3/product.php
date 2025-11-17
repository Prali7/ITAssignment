<?php
$inventory = [
    ["id" => 101, "name" => "Laptop", "price" => 75000, "stock" => 10],
    ["id" => 102, "name" => "Mouse", "price" => 500, "stock" => 50],
    ["id" => 103, "name" => "Keyboard", "price" => 1200, "stock" => 0],
    ["id" => 104, "name" => "Monitor", "price" => 25000, "stock" => 5]
];

echo "<h3>PRODUCT INVENTORY</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>ID</th><th>Name</th><th>Price</th><th>Stock</th></tr>";
$totalValue = 0;

foreach ($inventory as $item) {
    echo "<tr>";
    echo "<td>" . $item["id"] . "</td>";
    echo "<td>" . $item["name"] . "</td>";
    echo "<td>" . $item["price"] . "</td>";
    echo "<td>" . $item["stock"] . "</td>";
    echo "</tr>";
    $totalValue += $item["price"] * $item["stock"];
}
echo "</table><br>";
echo "<strong>OUT OF STOCK:</strong><br>";
foreach ($inventory as $item) {
    if ($item["stock"] == 0) {
        echo "- " . $item["name"] . " (ID: " . $item["id"] . ")<br>";
    }
}
echo "<br><strong>LOW STOCK (Need Reorder):</strong><br>";
foreach ($inventory as $item) {
    if ($item["stock"] < 10 && $item["stock"] > 0) {
        echo "- " . $item["name"] . " (ID: " . $item["id"] . ") - Only " . $item["stock"] . " units left<br>";
    }
}
echo "<br><strong>Total Inventory Value:</strong> Rs. " . number_format($totalValue);
?>