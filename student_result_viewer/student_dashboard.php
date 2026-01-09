<?php
session_start();
include 'config.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'student') {
    header("Location: access_denied.php");
    exit();
}
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM students WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$student = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/d1a61518bb.js" crossorigin="anonymous"></script>
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <header>
        <h1><i class="fa-solid fa-graduation-cap" style="color: #0f0f0f;"></i>  Student Result Viewer System - Student</h1>
        <nav><a href="logout.php">Logout</a></nav>
    </header>
    <main>
        <h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
        <div class="profile">
            <h3>Profile</h3>
            <p>Name: <?php echo $student['name']; ?></p>
            <p>Faculty: <?php echo $student['faculty']; ?></p>
            <p>Semester: <?php echo $student['semester']; ?></p>
        </div>
        <a href="view_my_results.php">View My Results</a>
    </main>
    <footer>&copy; 2026 Student Result Viewer System</footer>
</body>
</html>