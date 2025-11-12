<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f5f5f5;
        }
        h2 {
            color: #333;
        }
        form {
            background: white;
            padding: 20px;
            width: 400px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.2);
        }
        .output {
            margin-top: 30px;
            background: #fff;
            padding: 20px;
            width: 400px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<h2>Student Registration Form</h2>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <label>Full Name:</label><br>
    <input type="text" name="fullname" required><br><br>

    <label>Gender:</label><br>
    <input type="radio" name="gender" value="Male" required> Male
    <input type="radio" name="gender" value="Female"> Female
    <input type="radio" name="gender" value="Other"> Other
    <br><br>

    <label>Hobbies:</label><br>
    <input type="checkbox" name="hobbies[]" value="Reading"> Reading
    <input type="checkbox" name="hobbies[]" value="Sports"> Sports
    <input type="checkbox" name="hobbies[]" value="Music"> Music
    <input type="checkbox" name="hobbies[]" value="Traveling"> Traveling
    <br><br>

    <label>Country:</label><br>
    <select name="country" required>
        <option value="">--Select Country--</option>
        <option value="Nepal">Nepal</option>
        <option value="India">India</option>
        <option value="USA">USA</option>
        <option value="UK">UK</option>
    </select>
    <br><br>

    <label>Subjects:</label><br>
    <select name="subjects[]" multiple size="5" required>
        <option value="PHP">PHP</option>
        <option value="Java">Java</option>
        <option value="Database">Database</option>
        <option value="Networking">Networking</option>
        <option value="AI">AI</option>
    </select>
    <br><br>

    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $gender = $_POST['gender'];
    $hobbies = isset($_POST['hobbies']) ? implode(', ', $_POST['hobbies']) : 'None';
    $country = $_POST['country'];
    $subjects = isset($_POST['subjects']) ? implode(', ', $_POST['subjects']) : 'None';

    echo "<div class='output'>";
    echo "<h3>Student Registration Details</h3>";
    echo "<strong>Full Name:</strong> $fullname<br>";
    echo "<strong>Gender:</strong> $gender<br>";
    echo "<strong>Hobbies:</strong> $hobbies<br>";
    echo "<strong>Country:</strong> $country<br>";
    echo "<strong>Subjects:</strong> $subjects<br>";
    echo "</div>";
}
?>

</body>
</html>
