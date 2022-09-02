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

$id = htmlspecialchars($_POST['leave_id']);
$name = htmlspecialchars($_POST['leave_name']);
$day = htmlspecialchars($_POST['leave_day']);
$gender = htmlspecialchars($_POST['leave_gender']);

$sql = "UPDATE leave_type SET f_leave_name='$name', f_leave_max='$day', f_leave_gender='$gender', f_modified_date='$now' WHERE f_id='$id'";
// echo $sql; exit;
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>alert('Leaves Has Been Updated');</script>";
    echo "<script>window.location.href='../../../employee/setting.php';</script>";
} else {
    echo "<script>alert('Something Went wrong');</scrip>";
}