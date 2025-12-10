<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
$users = [
        "admin" => ["password" => "admin123", "role" => "admin"],
        "student" => ["password" => "student123", "role" => "student"]
    ];

    if (isset($users[$username]) && $users[$username]["password"] === $password) {
        $_SESSION["username"] = $username;
        $_SESSION["role"] = $users[$username]["role"];
        if ($_SESSION["role"] == "admin") {
            header("Location: admin.php");
        } else {
            header("Location: student.php");
        }
        exit;
    } else {
        echo "<p style='color:red;'>Invalid username or password!</p>";
    }
}
?>


<!DOCTYPE html>
<HTML>
    <head>
        <title> Login page </title>
</head>
<Body>
    <h2>Login form </h2>
    <form method="post">
        Username:<input type="Text" name="username" required><br><br>
        Password:<input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
</form>
</body>
</html>
