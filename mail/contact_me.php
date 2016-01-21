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
   $mail->AddReplyTo($email_address,$name);
   $mail->SetFrom($email_address, 'From '.$name);
   $address = "grifhammer@gmail.com";
   $mail->AddAddress($address, "Griffin Hammer");
   $mail->Subject    = "Contact email from Portfolio";
   $mail->MsgHTML($message." My phone number is: ".$phone);
   if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    return false;
   } else {
   echo "Message sent!";
   return true;
   }
?>

