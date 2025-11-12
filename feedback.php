<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px auto;
            width: 400px;
            text-align: center;
        }
        form {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 5px #aaa;
        }
        input, select, textarea {
            width: 90%;
            margin: 8px 0;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 50%;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 25px;
            background: #eaf3ff;
            padding: 15px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <h2>Feedback Form</h2>
    <form method="post" action="">
        <label><b>Name:</b></label><br>
        <input type="text" name="name" required><br>

        <label><b>Rating (1–5):</b></label><br>
        <select name="rating" required>
            <option value="">--Select--</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select><br>

        <label><b>Comment:</b></label><br>
        <textarea name="comment" rows="4" required></textarea><br>

        <input type="submit" value="Submit Feedback">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $rating = $_POST['rating'];
        $comment = $_POST['comment'];

        echo "<div class='result'>";
        echo "<h3>Feedback Received</h3>";
        echo "<p><b>Name:</b> $name</p>";
        echo "<p><b>Rating:</b> $rating / 5</p>";
        echo "<p><b>Comment:</b> $comment</p>";
        echo "</div>";
    }
    ?>

</body>
</html>
