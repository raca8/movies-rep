<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['process'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


require '../phpmailer/includes/PHPMailer.php';
require '../phpmailer/includes/SMTP.php';
require '../phpmailer/includes/Exception.php';



$mail = new PHPMailer();
//Set mailer to use smtp

$mail->CharSet = "UTF-8";
$mail->isSMTP();
//Define smtp host
$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
$mail->SMTPSecure = "tls";
//Port to connect smtp
$mail->Port = "587";
//Set gmail username
$mail->Username = "8raca8@gmail.com";
//Set gmail password
$mail->Password = "Raca1998-";
//Email subject
$mail->Subject = "Movies Contact Form";
//Set sender email
$mail->setFrom('8raca8@gmail.com');
//Enable HTML
$mail->isHTML(true);
//Attachment
// $mail->addAttachment('img/attachment.png');
//Email   
$mail->Body = "<p>Message from : $name <br><br>
        
      Message: $message</p>";
//Add recipient
$mail->addAddress("$email");
//Finally send email
if ($mail->send()) {
    echo "";
} else {
    echo "Message could not be sent. Mailer Error: "{
        $mail->ErrorInfo};
}
//Closing smtp connection
$mail->smtpClose();
}