<?php
include_once("../include/config.php");

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

$from_emp = trim($_GET["from_emp"]);
$to_emp = trim($_GET["to_emp"]);
$subject = trim($_GET["subject"]);
$reason = trim($_GET["reason"]);

$sql = "SELECT * FROM employees WHERE f_delete='N' AND f_id='$from_emp'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($result);
$sender_name = $rows['f_full_name'];
$sender_email = $rows['f_com_email'];

$sql2 = "SELECT * FROM leaves WHERE f_id='$to_emp'";
// echo $sql2; exit;
$result2 = mysqli_query($conn, $sql2);
$rows2 = mysqli_fetch_array($result2);
$emp_code = $rows2['f_emp_id'];

$sql3 = "SELECT * FROM employees WHERE f_delete='N' AND f_emp_id='$emp_code'";
$result3 = mysqli_query($conn, $sql3);
$rows3 = mysqli_fetch_array($result3);
$receiver_email = $rows3['f_com_email'];


	$username = $sender_email;
	$password = "@1phac0ret3ch123";

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
  
	$mail->Subject = $subject;
	$mail->msgHTML($reason);
	$mail->addAddress($receiver_email);
	// $mail->ErrorInfo;
	if (!$mail->send()) {
		$error = "Mailer Error: " . $mail->ErrorInfo;
		echo $error;
	}
	else {
		echo 'sent';
	}

?>
