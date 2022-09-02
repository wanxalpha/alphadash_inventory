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

$department_name = htmlspecialchars($_POST['dep_name']);

$sql = "INSERT INTO departments (f_department, f_created_date, f_modified_date) VALUES ('$department_name', '$now', '$now')";
$result  = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>alert('Department Has Been Added');</script>";
    echo "<script>window.location.href='../../../employee/designation.php';</script>";
} else {
    echo "<script>alert('Something Went wrong');</scrip>";
}