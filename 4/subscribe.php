<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php"; 

$msg = ""; 

if(isset($_POST['subscribe'])){

    $email = trim($_POST['email']);

    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $msg = "<span style='color:red;'>Invalid Email Address!</span>";
    } 
    else {

        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = "smtp.mailtrap.io";
        $mail->SMTPAuth = true;
        $mail->Username = "YOUR_MAILTRAP_USERNAME"; 
        $mail->Password = "YOUR_MAILTRAP_PASSWORD";
        $mail->Port = 2525;

        $mail->setFrom("newsletter@yourwebsite.com","Newsletter");
        $mail->addAddress($email);


        $mail->isHTML(true);
        $mail->Subject = "Thank you for subscribing";
        $mail->Body = "<h3>You are now subscribed to our Newsletter!</h3>
                       <p>You will receive updates soon.</p>";

    
        if($mail->send()){
            $msg = "<span style='color:green;'>Subscribed Successfully! Confirmation email sent.</span>";
        } 
        else {
            $msg = "<span style='color:red;'>Mail Error: ".$mail->ErrorInfo."</span>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Newsletter Subscription</title>
</head>
<body>

<h2>Subscribe to Newsletter</h2>

<form method="POST">
    <input type="email" name="email" placeholder="Enter Email" required>
    <button type="submit" name="subscribe">Subscribe</button>
</form>

<?php echo $msg; ?> 

</body>
</html>
