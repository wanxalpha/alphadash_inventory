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

$from_emp = trim($_GET["from_emp"]);
$to_emp = trim($_GET["to_emp"]);
$subject = trim($_GET["subject"]);

function random_strings($length_of_string){
    return substr(md5(time()), 0, $length_of_string);
}
// echo random_strings(10);
$new_code = random_strings(10);

$reason = "Good Morning,";
$reason .= "<br>";
$reason .= "The New Password is $new_code ";
$reason .= "<br>";
$reason .= "Please reset your password after this";
$reason .= "<br>";
$reason .= "Thanks and Best Regards,";
$reason .= "<br>";
$reason .= "Support";

// echo $reason;

$check = "SELECT * FROM employees WHERE f_delete='N' AND f_com_email='$to_emp'";
$result = mysqli_query($conn, $check);
$num = mysqli_num_rows($result);

if($num > 0){
    $sender_email = $from_emp;
    $sender_name = "Support";
    $receiver_email = $to_emp;

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
		// echo $error;
        echo $error;
	}
	else {
        $sql = "UPDATE employees SET f_password='$new_code', f_modified_date='$now' WHERE f_com_email='$to_emp'";
        // echo $sql; exit;
        $result = mysqli_query($conn, $sql);

        if($result){
            echo 'ok';
        }
	}
}else{
    echo 'not ok';
}

    

?>
