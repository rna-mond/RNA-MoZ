<html>
<head>
<title>PHPMailer - SMTP (Gmail) authenrication</title>
</head>
<body>
<?php
	require("PHPMailer_5.2.4/class.phpmailer.php");
    $email = "raymondagusa7@gmail.com";
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->From = "raymondagusa7@gmail.com";
    $mail->FromName  =  "My name";
    $mail->AddAddress("raymondagusa7@gmail.com");
    $mail->AddAddress("raymondagusa1@gmail.com");
    $mail->SMTPAuth = true;
    $mail->Username = "raymondagusa7@gmail";
    $mail->Password =  "sopomore1992";
    $mail->Port  =  465;
    $mail->Subject = "Test email";
    $mail->Body = "This is a test email.";
    $mail->WordWrap = 50;
    if(!$mail->Send())
    {
        echo 'Message was not sent.';
        echo 'Mailer error: ' . $mail->ErrorInfo;
    }
    else
    {
        echo 'Email has been sent!!';
    }
?>
</body>
</html>