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

$name = htmlspecialchars($_POST['designation']);
$department = htmlspecialchars($_POST['department']);
$post_code = htmlspecialchars($_POST['post_code']);

$sql = "INSERT INTO designations (f_position, f_department, f_post_code, f_created_date, f_modified_date) VALUES ('$name', '$department', '$post_code', '$now', '$now')";
// echo $sql; exit;
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>alert('Designation Has Been Added');</script>";
    echo "<script>window.location.href='../../../employee/designation.php';</script>";
} else {
    echo "<script>alert('Something Went wrong');</scrip>";
}