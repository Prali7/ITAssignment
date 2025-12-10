<?php
class MyException extends Exception {}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        if ($_FILES["file"]["error"] != 0) {
            throw new MyException("No file uploaded");
        }

        move_uploaded_file($_FILES["file"]["tmp_name"], "myfile.txt");
        echo "File uploaded successfully";

    } catch (MyException $e) {
        echo "Error: " . $e->getMessage();

    } finally {
        echo "<br>Done";
    }
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload">
</form>
