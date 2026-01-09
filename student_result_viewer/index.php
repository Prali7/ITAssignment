<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];
            if ($user['role'] == 'admin') {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: student_dashboard.php");
            }
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
     <script src="https://kit.fontawesome.com/d1a61518bb.js" crossorigin="anonymous"></script>
</head>
<body>
    <header> 
        <h1><i class="fa-solid fa-graduation-cap" style="color: #0f0f0f;"></i>  Student Result Viewer System</h1>
        <nav><a href="register.php">Register</a></nav>
    </header>
    <main>
        <h2>Login</h2>
        <form method="POST">
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
    </main>
    <footer>&copy; 2026 Student Result Viewer System</footer>
</body>
</html>