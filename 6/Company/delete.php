<?php
include "db_connect.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM employee WHERE id=$id");

mysqli_close($conn);

header("Location: view.php");
?>