<?php
include_once("../../include/config.php");

mysqli_set_charset($conn, "utf8");

date_default_timezone_set("Asia/Kuala_Lumpur");
$t = time();
$now = date("Y-m-d H:i:s", $t);
$curdate = date("Y-m-d", $t);
$year = date("Y", $t);
$hour = date("H", $t);
$minute = date("i", $t);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$to_emp = trim($_GET["emp_code"]);
$status = trim($_GET["status"]);

if($status == "Approved"){
    $content = "Your Purchase Application Has Been Approved";
}else{
    $content = "Your Purchase Application Has Been Rejected, Please seek HR for advice";
}

$sql2 = "SELECT * FROM employees WHERE f_emp_id='$to_emp'";
// echo $sql2; exit;
$result2 = mysqli_query($conn, $sql2);
$rows2 = mysqli_fetch_array($result2);
$receiver_name = $rows2['f_full_name'];
$receiver_email = $rows2['f_com_email'];

$username = 'support@alphacoretech.net';
$password = "@1phac0ret3ch123";

$sender_email = 'support@alphacoretech.net';
$sender_name = 'Support';

$mail = new PHPMailer(true);
$mail->isSMTP();
//$mail->SMTPDebug = 2;
$mail->Host = 'mail.alphacoretech.net';
$mail->SMTPAuth = true;

$mail->SMTPSecure = 'ssl';
$mail->Port = 465.;

$mail->setFrom($sender_email, $sender_name);
$mail->Username = $username;
$mail->Password = $password;

$mail->Subject = 'Purchase Application';
$mail->msgHTML('<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Purchase Application</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body style="background:#F7F3F3;font-family: Helvetica,Arial,sans-serif;padding-top:30px;">
    
    
    
        <div style="display:block;max-width:500px;width:calc(100% - 30px);margin-left:auto;margin-right:auto;margin-top:20px;margin-bottom:20px;background:#fff;padding:10px 20px;text-align:left;">
        
        <img src="#" style="width:200px;display:block;margin-left:auto;margin-right:auto;margin-bottom:20px;">
        
        Hi '.$receiver_name.',
        <br>
        <br>
        '.$content.'. 
        <br>

        </div>
        <div style="display:block;max-width:500px;width:calc(100% - 30px);margin-left:auto;margin-right:auto;margin-top:10px;margin-bottom:20px;background:#ddd;padding:10px 20px;text-align:center;color:#fff;">

        © '.date("Y").' alphacoretech.net
        <br>
        Alphadash HRMS system
        
        </div>
    
    </body>
</html>');
$mail->addAddress($receiver_email);
$mail->addCC('syaffa@alphacoretech.net');
$mail->addCC('mukhlis@alphacoretech.net');
// $mail->ErrorInfo;
if (!$mail->send()) {
    $error = "Mailer Error: " . $mail->ErrorInfo;
    echo $error;
}
else {
    echo 'sent';
}

?>
