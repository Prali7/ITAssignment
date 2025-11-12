<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Menu Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        a {
            margin: 10px;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            padding: 8px 15px;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3;
        }
        .content {
            margin-top: 30px;
            border-top: 2px solid #ccc;
            padding-top: 20px;
        }
    </style>
</head>
<body>

    <h2>Simple PHP Dynamic Menu</h2>
    <a href="menu.php?page=home">Home</a>
    <a href="menu.php?page=about">About</a>
    <a href="menu.php?page=contact">Contact</a>

    <div class="content">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == "home") {
                echo "<h3>Welcome to the Home Page</h3>";
                echo "<p>This is the main page of our website.</p>";
            } 
            elseif ($page == "about") {
                echo "<h3>About Us</h3>";
                echo "<p>This website is created to demonstrate dynamic page loading using PHP.</p>";
            } 
            elseif ($page == "contact") {
                echo "<h3>Contact Us</h3>";
                echo "<p>Email: info@example.com<br>Phone: +977-9800000000</p>";
            } 
            else {
                echo "<h3>404 Error</h3>";
                echo "<p>Page not found!</p>";
            }
        } 
        else {
            echo "<h3>Welcome!</h3>";
            echo "<p>Select a page from the menu above.</p>";
        }
        ?>
    </div>

</body>
</html>
