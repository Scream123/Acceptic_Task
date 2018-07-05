<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from       = 'from@'.BaseUrl.'.com';
$mail       = new PHPMailer();
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "Localhost"; // Amazon SES server, note "tls://" protocol
$mail->Port       =  81;                    // set the SMTP port
$mail->Username   = "Admin";  // SMTP  username
$mail->Password   = "Admin";  // SMTP password
$mail->SetFrom($from, 'Vladimir');
$mail->AddReplyTo($from,'From User');
$mail->Subject    = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->Send();   
}
?>
