<?php
session_start();
include 'config.php';
if ($_SESSION['role'] != 'admin') {
    header("Location: access_denied.php");
    exit();
}

$students_result = $conn->query("SELECT student_id, name FROM students");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];
    $grade = $_POST['grade'];
    $remarks = $_POST['remarks'];
    $check_stmt = $conn->prepare("SELECT student_id FROM students WHERE student_id = ?");
    $check_stmt->bind_param("i", $student_id);
    $check_stmt->execute();
    if ($check_stmt->get_result()->num_rows == 0) {
        echo "Invalid student ID.";
    } else {
        $stmt = $conn->prepare("INSERT INTO results (student_id, subject, marks, grade, remarks) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isiss", $student_id, $subject, $marks, $grade, $remarks);
        if ($stmt->execute()) {
            echo "Result added successfully. <a href='admin_dashboard.php'>Back to Dashboard</a>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $check_stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Result</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/d1a61518bb.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <h1><i class="fa-solid fa-graduation-cap" style="color: #0f0f0f;"></i>  Student Result Viewer System - Admin</h1>
        <nav><a href="admin_dashboard.php">Dashboard</a> | <a href="logout.php">Logout</a></nav>
    </header>
    <main>
        <h2>Add New Result</h2>
        <form method="POST">
            <select name="student_id" required>
                <option value="">Select Student</option>
                <?php while ($student = $students_result->fetch_assoc()) { ?>
                    <option value="<?php echo $student['student_id']; ?>"><?php echo $student['name']; ?> (ID: <?php echo $student['student_id']; ?>)</option>
                <?php } ?>
            </select><br>
            <input type="text" name="subject" placeholder="Subject" required><br>
            <input type="number" name="marks" placeholder="Marks" required><br>
            <input type="text" name="grade" placeholder="Grade" required><br>
            <textarea name="remarks" placeholder="Remarks"></textarea><br>
            <button type="submit">Add Result</button>
        </form>
    </main>
    <footer>&copy; 2026 Student Result Viewer System</footer>
</body>
</html>