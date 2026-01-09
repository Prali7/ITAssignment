<?php
session_start();
include 'config.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: access_denied.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/d1a61518bb.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <h1><i class="fa-solid fa-graduation-cap" style="color: #0f0f0f;"></i>  Student Result Viewer System - Admin</h1>
        <nav><a href="logout.php">Logout</a></nav>
    </header>
    <main>
        <h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
        <div class="dashboard">
            <a href="add_result.php">Add Result</a>
            <a href="view_results.php">View All Results</a>
        </div>
    </main>
    <footer>&copy; 2026 Student Result Viewer System</footer>
</body>
</html>