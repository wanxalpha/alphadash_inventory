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

$name = htmlspecialchars($_POST['facility_name']);
$location = htmlspecialchars($_POST['facility_location']);

$sql = "INSERT INTO facility_room (f_room, f_location, f_created_date, f_modified_date) VALUES ('$name', '$location', '$now', '$now')";
// echo $sql; exit;
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>alert('Facility Has Been Added');</script>";
    echo "<script>window.location.href='../../../employee/setting.php';</script>";
} else {
    echo "<script>alert('Something Went wrong');</scrip>";
}