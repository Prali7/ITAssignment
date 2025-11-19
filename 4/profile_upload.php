<?php
$nameError = $fileError = "";
$successMsg = "";
$fileInfo = "";
$uploadedImage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["username"])) {
        $nameError = "Name is required.";
    } elseif (strlen($_POST["username"]) < 3) {
        $nameError = "Name must be at least 3 characters.";
    } else {
        $username = htmlspecialchars($_POST["username"]);
    }
    if (!isset($_FILES["profile"]) || $_FILES["profile"]["error"] == 4) {
        $fileError = "File is required.";
    } else {
        $file = $_FILES["profile"];
        if ($file["error"] !== 0) {
            $fileError = "Upload error code: " . $file["error"];
        } else {
            $allowed = ["image/jpeg", "image/jpg", "image/png", "image/gif"];

            if (!in_array($file["type"], $allowed)) {
                $fileError = "Invalid file type. Only JPG, PNG, GIF allowed.";
            }
            if ($file["size"] > 2 * 1024 * 1024) {
                $fileError = "File size exceeds 2MB limit.";
            }
        }
    }
    if ($nameError === "" && $fileError === "") {
        if (!is_dir("uploads")) {
            mkdir("uploads");
        }
        $fileName = basename($file["name"]);
        $targetPath = "uploads/" . $fileName;
        if (move_uploaded_file($file["tmp_name"], $targetPath)) {
            
            $successMsg = "Profile Picture Uploaded Successfully!";
            $fileInfo = [
                "File Name" => $fileName,
                "File Size" => round($file["size"] / 1024 / 1024, 2) . " MB",
                "File Type" => $file["type"],
                "Saved Location" => $targetPath
            ];

            $uploadedImage = "<img src='$targetPath' width='200px'>";
        } else {
            $fileError = "Failed to save uploaded file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Upload</title>
</head>
<body>

<h2>Upload Profile Picture</h2>

<?php
if ($nameError || $fileError) {
    echo "<h3>Upload Errors:</h3><ul>";
    if ($nameError) echo "<li>$nameError</li>";
    if ($fileError) echo "<li>$fileError</li>";
    echo "</ul>";
}
?>
<?php
if ($successMsg) {
    echo "<h3>$successMsg</h3>";
    echo "<p><strong>User Name:</strong> $username</p>";

    echo "<h3>File Information:</h3><ul>";
    foreach ($fileInfo as $key => $val) {
        echo "<li><strong>$key:</strong> $val</li>";
    }
    echo "</ul>";

    echo $uploadedImage;
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <label>User Name:</label><br>
    <input type="text" name="username"> <br><br>

    <label>Profile Picture:</label><br>
    <input type="file" name="profile"><br><br>

    <button type="submit">Upload</button>
</form>

</body>
</html>
