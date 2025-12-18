
<?php
include "db_connect.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM employee WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $id  =  $_POST['id'];
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    mysqli_query($conn, "UPDATE employee
        SET name='$name', email='$email', department='$department'
        WHERE id=$id");

    mysqli_close($conn);
    header("Location: view.php");
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Edit Employee Details</h2>

<form method="post">
    ID:<input type="number" name="id" value="<?php echo $row['id']; ?>"required><br><br>
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
    Department: <input type="text" name="department" value="<?php echo $row['department']; ?>" required><br><br>
    <input type="submit" name="update" value="Update">
</form>

</body>
</html>