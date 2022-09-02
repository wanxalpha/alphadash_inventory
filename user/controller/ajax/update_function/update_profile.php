<?php
include_once("../../../include/config.php");

mysqli_set_charset($conn, "utf8");

date_default_timezone_set("Asia/Kuala_Lumpur");
$t = time();
$now = date("Y-m-d H:i:s", $t);
$curdate = date("Y-m-d", $t);
$year = date("Y", $t);
$hour = date("H", $t);
$minute = date("i", $t);

//personal information	
$fullname = htmlspecialchars($_POST['full_name']);
$birthday = htmlspecialchars($_POST['birth_date']);
$phone = htmlspecialchars($_POST['mobile']);
$home_tel = htmlspecialchars($_POST['home_tel']);
$email = htmlspecialchars($_POST['email']);
$address = htmlspecialchars($_POST['address']);
$gender = htmlspecialchars($_POST['gender']);
$emp_code = htmlspecialchars($_POST['emp_code']);
$password = htmlspecialchars($_POST['password']);

$sql = "UPDATE employees SET f_full_name='$fullname', f_birth_date='$birthday', f_contact='$phone', f_password='$password', f_home_tel='$home_tel', f_email='$email', f_address='$address', f_gender='$gender', f_modified_date='$now' WHERE f_emp_id='$emp_code'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo '1';
} else {
    echo '0';
}

$dbh = null;
