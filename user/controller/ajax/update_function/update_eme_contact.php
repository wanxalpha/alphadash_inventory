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

$ec1_name = htmlspecialchars($_POST['ec1_name']);
$ec1_relationship = htmlspecialchars($_POST['ec1_relation']);
$ec1_contact = htmlspecialchars($_POST['ec1_contact']);
$ec2_name = htmlspecialchars($_POST['ec2_name']);
$ec2_relationship = htmlspecialchars($_POST['ec2_relation']);
$ec2_contact = htmlspecialchars($_POST['ec2_contact']);
$emp_code = htmlspecialchars($_POST['emp_code']);

$sql = "UPDATE employees SET f_ec1_name='$ec1_name', f_ec1_relationship='$ec1_relationship', f_ec1_contact='$ec1_contact', f_ec2_name='$ec2_name', f_ec2_relationship='$ec2_relationship', f_ec2_contact='$ec2_contact', f_modified_date='$now' WHERE f_emp_id='$emp_code'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo '1';
} else {
    echo '0';
}

$dbh = null;

?>
