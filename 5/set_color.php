<?php
if (isset($_POST['color'])) {
    $color = $_POST['color'];
    setcookie("user_color", $color, time() + 3600);

    echo "Cookie set successfully! <a href='show_color.php'>Go to Show Color Page</a>";
}
?>

<!DOCTYPE html>
<html>
<body>

<h3>Select Your Favorite Color</h3>

<form method="POST">
    <label>Select Color:</label>
    <select name="color">
        <option value="red">Red</option>
        <option value="blue">Blue</option>
        <option value="green">Green</option>
    </select>

    <button type="submit">Save Color</button>
</form>

</body>
</html>
