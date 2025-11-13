<?php
$size = "";
$toppings = [];
$crust = "";
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $size = $_POST['size'] ?? "";
    $toppings = $_POST['toppings'] ?? [];
    $crust = $_POST['crust'] ?? "";
    if (empty($size)) {
        $errors[] = "Please select a pizza size.";
    }

    if (empty($toppings)) {
        $errors[] = "Please choose at least one topping.";
    }
    if (empty($errors)) {
        echo "<h2>Order Summary</h2>";
        echo "<p><strong>Size:</strong> $size</p>";
        echo "<p><strong>Toppings:</strong> " . implode(", ", $toppings) . "</p>";
        echo "<p><strong>Crust:</strong> $crust</p>";
        echo "<hr>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pizza Order Form</title>
    <style>
        body {
            font-family: Arial;
            margin: 30px;
        }
        .error {
            color: red;
        }
        form {
            background: #f9f9f9;
            padding: 20px;
            width: 320px;
            border-radius: 8px;
        }
        h2 { margin-bottom: 10px; }
    </style>
</head>
<body>

<h2> Pizza Order Form</h2>
<?php
if (!empty($errors)) {
    echo "<div class='error'><ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul></div>";
}
?>

<form method="POST" action="">
    <label><strong>Size:</strong></label><br>
    <input type="radio" name="size" value="Small" <?php if ($size == "Small") echo "checked"; ?>> Small<br>
    <input type="radio" name="size" value="Medium" <?php if ($size == "Medium") echo "checked"; ?>> Medium<br>
    <input type="radio" name="size" value="Large" <?php if ($size == "Large") echo "checked"; ?>> Large<br><br>
    <label><strong>Toppings:</strong></label><br>
    <input type="checkbox" name="toppings[]" value="Cheese" <?php if (in_array("Cheese", $toppings)) echo "checked"; ?>> Cheese<br>
    <input type="checkbox" name="toppings[]" value="Mushroom" <?php if (in_array("Mushroom", $toppings)) echo "checked"; ?>> Mushroom<br>
    <input type="checkbox" name="toppings[]" value="Onion" <?php if (in_array("Onion", $toppings)) echo "checked"; ?>> Onion<br>
    <input type="checkbox" name="toppings[]" value="Olive" <?php if (in_array("Olive", $toppings)) echo "checked"; ?>> Olive<br><br>
    <label><strong>Crust Type:</strong></label><br>
    <select name="crust">
        <option value="Thin" <?php if ($crust == "Thin") echo "selected"; ?>>Thin</option>
        <option value="Regular" <?php if ($crust == "Regular") echo "selected"; ?>>Regular</option>
        <option value="Thick" <?php if ($crust == "Thick") echo "selected"; ?>>Thick</option>
    </select><br><br>

    <input type="submit" value="Order Pizza">
</form>

</body>
</html>
