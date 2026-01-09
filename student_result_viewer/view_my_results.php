<?php
session_start();
include 'config.php';
if ($_SESSION['role'] != 'student') {
    header("Location: access_denied.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT r.subject, r.marks, r.grade, r.remarks FROM results r JOIN students s ON r.student_id = s.student_id WHERE s.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Results</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/d1a61518bb.js" crossorigin="anonymous"></script>
</head>
<body>
    <header> 
        <h1><i class="fa-solid fa-graduation-cap" style="color: #0f0f0f;"></i>  Student Result Viewer System - Student</h1>
        <nav><a href="student_dashboard.php">Dashboard</a> | <a href="logout.php">Logout</a></nav>
    </header>
    <main>
        <h2>My Academic Results</h2>
        <table>
            <tr><th>Subject</th><th>Marks</th><th>Grade</th><th>Remarks</th></tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['subject']; ?></td>
                    <td><?php echo $row['marks']; ?></td>
                    <td><?php echo $row['grade']; ?></td>
                    <td><?php echo $row['remarks']; ?></td>
                </tr>
            <?php } ?>
        </table>
    </main>
    <footer>&copy; 2026 Student Result Viewer System</footer>
</body>
</html>