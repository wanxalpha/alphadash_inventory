
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

$id = htmlspecialchars($_POST['facility_id']);
$name = htmlspecialchars($_POST['facility_name']);
$location = htmlspecialchars($_POST['facility_location']);


$sql = "UPDATE facility_room SET f_room='$name', f_location='$location', f_modified_date='$now' WHERE f_id='$id'";
// echo $sql; exit;
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>alert('Facility Has Been Updated');</script>";
    echo "<script>window.location.href='../../../employee/setting.php';</script>";
} else {
    echo "<script>alert('Something Went wrong');</scrip>";
}