<?php
session_start();
include 'config.php';
if ($_SESSION['role'] != 'admin') {
    header("Location: access_denied.php");
    exit();
}

$result = $conn->query("SELECT r.result_id, s.name, r.subject, r.marks, r.grade, r.remarks FROM results r JOIN students s ON r.student_id = s.student_id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Results</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/d1a61518bb.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <h1><i class="fa-solid fa-graduation-cap" style="color: #0f0f0f;"></i>  Student Result Viewer System - Admin</h1>
        <nav><a href="admin_dashboard.php">Dashboard</a> | <a href="logout.php">Logout</a></nav>
    </header>
    <main>
        <h2>All Student Results</h2>
        <table>
            <tr><th>Student Name</th><th>Subject</th><th>Marks</th><th>Grade</th><th>Remarks</th><th>Actions</th></tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['subject']; ?></td>
                    <td><?php echo $row['marks']; ?></td>
                    <td><?php echo $row['grade']; ?></td>
                    <td><?php echo $row['remarks']; ?></td>
                    <td>
                        <a href="edit_result.php?id=<?php echo $row['result_id']; ?>">Edit</a> |
                        <a href="delete_result.php?id=<?php echo $row['result_id']; ?>" onclick="return confirm('Delete?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </main>
    <footer>&copy; 2026 Student Result Viewer System</footer>
</body>
</html>