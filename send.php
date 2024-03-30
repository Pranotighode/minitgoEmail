<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {

    $mail = new PHPMailer(true);

    try {
      
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'pranotighode.sknscoe.comp@gmail.com';
        $mail->Password   = 'ilpu ekfm quch eegj';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 587;

    
        $mail->setFrom($_POST["email"], $_POST["name"]);
        $mail->addAddress('pranotighode.sknscoe.comp@gmail.com');
        $mail->addReplyTo($_POST["email"], $_POST["name"]);
        $mail->addCC($_POST["cc"], $_POST["name"]);;

       
        $mail->isHTML(true);
        $mail->Subject = $_POST["subject"];
        $mail->Body    = $_POST["message"];

      
        $mail->send();
        
      
        echo "<script>alert('Message was sent successfully!');</script>";
        echo "<script>location.href = 'index.php';</script>";
        exit;
    } catch (Exception $e) {
       
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
    }
}
?>
