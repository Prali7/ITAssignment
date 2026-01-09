<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Access Denied</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/d1a61518bb.js" crossorigin="anonymous"></script>
</head>
<body>
    <header> 
        <h1><i class="fa-solid fa-graduation-cap" style="color: #0f0f0f;"></i> Student Result Viewer System</h1>
    </header>
    <main>
        <h2>Access Denied</h2>
        <p>You do not have permission to access this page.</p>
        <a href="logout.php">Logout</a>
    </main>
    <footer>&copy; 2026 Student Result Viewer System</footer>
</body>
</html>