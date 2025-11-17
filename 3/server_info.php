<!DOCTYPE html>
<html>
<head>
    <title>Server and Client Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px auto;
            width: 500px;
            background-color: #f9f9f9;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaa;
        }
        h2 {
            text-align: center;
            color: #007BFF;
        }
        p {
            font-size: 16px;
            margin: 10px 0;
            background: #fff;
            padding: 10px;
            border-radius: 6px;
            box-shadow: 0 0 3px #ddd;
        }
        span {
            color: #333;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Server and Client Information</h2>
    <?php
    $ip = $_SERVER['REMOTE_ADDR'];
    $browser_os = $_SERVER['HTTP_USER_AGENT'];
    $server_name = $_SERVER['SERVER_NAME'];
    echo "<p><span>Client IP Address:</span> $ip</p>";
    echo "<p><span>Browser & OS:</span> $browser_os</p>";
    echo "<p><span>Server Name:</span> $server_name</p>";
    ?>
</body>
</html>
