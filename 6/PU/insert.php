<?php
include"db_connect.php";
if ($_SERVER['REQUEST_METHOD']==='POST'){
$ID = $_POST['id'];
$Name = $_POST['name'];
$Email = $_POST['email'];
$Phone = $_POST['phone'];


$sql = "INSERT INTO record (ID,Name, Email, Phone)
        VALUES ('$ID','$Name', '$Email', '$Phone')";

mysqli_query($conn,$sql);
header("location:view.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h2> INSERT CUSTOMER DETAILS </h2>
    <form method ="post">
        Id:<input type="number" name="id" required><br><br>
        Name:<input type="text" name="name" required><br><br>
        Email:<input type="email" name="email" required><br><br>
        Phone:<input type="number" name="phone" required><br><br>
        <input type="submit" name="submit" value="Insert" required><br><br>
</form>
</body>
</html>