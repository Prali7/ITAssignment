<?php
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $checkQuery = "SELECT * FROM users WHERE email='$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<p>Email already registered!</p>";
    } else {
        $insertQuery = "INSERT INTO users (name, email, password)
                        VALUES ('$name', '$email', '$hashedPassword')";

        if (mysqli_query($conn, $insertQuery)) {
            echo "<p>Registration successful!</p>";
        } else {
            echo "<p>Error during registration.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>

<h2>Register New User</h2>

<form method="post" action="">
    <label>Name</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <input type="submit" value="Register">
</form>

<br>
Already registered? <a href="login.php">Login here</a>

</body>
</html>