<?php


// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

    require_once('/usr/share/php/libphp-phpmailer/class.phpmailer.php');
    $mail = new PHPMailer(); // defaults to using php "mail()"
    $mail->AddReplyTo($email,$name);
    $mail->SetFrom($email, 'From '.$name);
    $address = "grifhammer@gmail.com";
    $mail->AddAddress($address, "Robert D Bunch");
    $mail->Subject    = "Contact email from Portfolio";
    $mail->MsgHTML($message);
    if(!$mail->Send()) {
       echo "Mailer Error: " . $mail->ErrorInfo;
       return false
    } else {
    echo "Message sent!";
    return true;
    }
?>