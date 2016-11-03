<?php
/**
* This example shows making an SMTP connection with authentication.
*/

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Asia/Bangkok');

require 'PHPMailer-5.2-stable/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->CharSet = "utf-8";
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.gmail.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "geniustreethailand@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "Geniusqwerty";
//Set who the message is to be sent from
$mail->setFrom('geniustreethailand@gmail.com', 'IT Admin');
//Set who the message is to be sent to

foreach($recipients as $email => $name)
{
   //echo "$email, $name <br />";
   $mail->addAddress($email,$name);
}


//$mail->addAddress('nakarin.guy@gmail.com', 'nakarin','nakarin.guy@gmail.com', 'nakarin');
//Set the subject line
$mail->Subject = $headMessage;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
$mail->msgHTML($bodyMessage);

//send the message, check for errors
if (!$mail->send()) {
   echo "Mailer Error: ".$mail->ErrorInfo;
} else {
   echo "Message sent!";
}
