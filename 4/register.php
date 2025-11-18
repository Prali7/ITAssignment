<?php
$fullName = $username = $email = $age = "";
$errors = [];
$success = false;
$passwordStrength = "";
function checkStrength($password) {
    $score = 0;
    if (preg_match('/[a-z]/', $password)) $score++;
    if (preg_match('/[A-Z]/', $password)) $score++;
    if (preg_match('/\d/', $password)) $score++;
    if (strlen($password) >= 12) $score++;

    if ($score <= 1) return "Weak";
    if ($score == 2) return "Medium";
    return "Strong";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = htmlspecialchars(trim($_POST['fullname']));
    $username = htmlspecialchars(trim($_POST['username']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $age = trim($_POST['age']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    if (empty($fullName)) {
        $errors['fullname'] = "Full Name is required.";
    } elseif (strlen($fullName) < 3) {
        $errors['fullname'] = "Full Name must be at least 3 characters.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $fullName)) {
        $errors['fullname'] = "Full Name can contain only letters and spaces.";
    }
    if (empty($username)) {
        $errors['username'] = "Username is required.";
    } elseif (!preg_match("/^[a-zA-Z0-9_]{5,15}$/", $username)) {
        $errors['username'] = "Username must be 5-15 characters (letters, numbers, underscore).";
    }
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    } elseif (strpos($email, " ") !== false) {
        $errors['email'] = "Email cannot contain spaces.";
    }
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
        $errors['password'] = "Password must be at least 8 characters with uppercase, lowercase, and number.";
    } else {
        $passwordStrength = checkStrength($password);
    }
    if ($confirmPassword !== $password) {
        $errors['confirm_password'] = "Passwords do not match.";
    }
    if (empty($age)) {
        $errors['age'] = "Age is required.";
    } elseif (!is_numeric($age)) {
        $errors['age'] = "Age must be numeric.";
    } elseif ($age < 18 || $age > 100) {
        $errors['age'] = "Age must be between 18 and 100.";
    }
    if (empty($errors)) {
        $success = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Registration Form</title>
    <style>
        .error { color: red; font-size: 14px; }
        .success-box { border: 1px solid green; padding: 10px; margin-top: 20px; }
        .strength { font-weight: bold; }
    </style>
</head>
<body>

<h2>Registration Form</h2>

<form method="post">
    Full Name: <br>
    <input type="text" name="fullname" value="<?php echo $fullName; ?>">
    <div class="error"><?php echo $errors['fullname'] ?? ""; ?></div><br>
    Username: <br>
    <input type="text" name="username" value="<?php echo $username; ?>">
    <div class="error"><?php echo $errors['username'] ?? ""; ?></div><br>
    Email: <br>
    <input type="email" name="email" value="<?php echo $email; ?>">
    <div class="error"><?php echo $errors['email'] ?? ""; ?></div><br>
    Password: <br>
    <input type="password" name="password">
    <div class="error"><?php echo $errors['password'] ?? ""; ?></div>
    <?php if ($passwordStrength): ?>
        <p>Password Strength: <span class="strength"><?php echo $passwordStrength; ?></span></p>
    <?php endif; ?>
    <br>
    Confirm Password: <br>
    <input type="password" name="confirm_password">
    <div class="error"><?php echo $errors['confirm_password'] ?? ""; ?></div><br>
    Age: <br>
    <input type="number" name="age" value="<?php echo $age; ?>">
    <div class="error"><?php echo $errors['age'] ?? ""; ?></div><br>

    <button type="submit">Register</button>
</form>

<?php if ($success): ?>
    <div class="success-box">
        <h3>Registration Successful!</h3>
        <p><strong>Full Name:</strong> <?php echo $fullName; ?></p>
        <p><strong>Username:</strong> <?php echo $username; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Age:</strong> <?php echo $age; ?></p>
        <p><strong>Password Strength:</strong> <?php echo $passwordStrength; ?></p>
    </div>
<?php endif; ?>

</body>
</html>
