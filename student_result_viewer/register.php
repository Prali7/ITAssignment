<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $faculty = isset($_POST['faculty']) ? $_POST['faculty'] : null;
    $semester = isset($_POST['semester']) ? (int)$_POST['semester'] : null;

   
    if (empty($name) || empty($email) || empty($password) || empty($role)) {
        echo "All fields are required.";
    } elseif ($role == 'student' && (empty($faculty) || empty($semester))) {
        echo "Faculty and semester are required for students.";
    } else {
       
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $password, $role);
        if ($stmt->execute()) {
            $user_id = $conn->insert_id;  

            if ($role == 'student') {
                $stmt2 = $conn->prepare("INSERT INTO students (user_id, name, faculty, semester) VALUES (?, ?, ?, ?)");
                $stmt2->bind_param("issi", $user_id, $name, $faculty, $semester);
                if (!$stmt2->execute()) {
                    echo "Error adding student profile: " . $stmt2->error;
                }
                $stmt2->close();
            }

            echo "Registration successful. <a href='index.php'>Login</a>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/d1a61518bb.js" crossorigin="anonymous"></script>
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        
        function toggleStudentFields() {
            var role = document.getElementById('role').value;
            var studentFields = document.getElementById('studentFields');
            if (role === 'student') {
                studentFields.style.display = 'block';
            } else {
                studentFields.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <header> 
        <h1><i class="fa-solid fa-graduation-cap" style="color: #0f0f0f;"></i>  Student Result Viewer System</h1>
        <nav><a href="index.php">Login</a></nav>
    </header>
    <main>
        <h2>Register</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Name" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <select name="role" id="role" onchange="toggleStudentFields()" required>
                <option value="">Select Role</option>
                <option value="admin">Admin</option>
                <option value="student">Student</option>
            </select><br>
            <div id="studentFields" style="display: none;">
                <input type="text" name="faculty" placeholder="Faculty" required><br>
                <input type="number" name="semester" placeholder="Semester" required><br>
            </div>
            <button type="submit">Register</button>
        </form>
    </main>
    <footer>&copy; 2026 Student Result Viewer System</footer>
</body>
</html>