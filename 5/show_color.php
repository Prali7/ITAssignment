<?php
if (isset($_COOKIE['user_color'])) {
    $selectedColor = $_COOKIE['user_color'];
} else {
    $selectedColor = "No color selected yet!";
}
?>

<!DOCTYPE html>
<html>
<body>

<h3>Your selected color is: <?php echo $selectedColor; ?></h3>

</body>
</html>
