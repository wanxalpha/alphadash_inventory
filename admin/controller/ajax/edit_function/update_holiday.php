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

$holiday_id = htmlspecialchars($_POST['edit_holiday_id']);
$holiday_name = htmlspecialchars($_POST['edit_holiday_name']);
$holiday_date1 = htmlspecialchars($_POST['edit_holiday_date1']);
$holiday_day1 = htmlspecialchars($_POST['edit_holiday_day1']);
$holiday_date2 = htmlspecialchars($_POST['edit_holiday_date2']);
$holiday_day2 = htmlspecialchars($_POST['edit_holiday_day2']);
$restart_date = htmlspecialchars($_POST['edit_restart_date']);
$restart_day = htmlspecialchars($_POST['edit_restart_day']);
$reend_date = htmlspecialchars($_POST['edit_reend_date']);
$reend_day = htmlspecialchars($_POST['edit_reend_day']);
$duplicate = htmlspecialchars($_POST['edit_duplicate']);


if($restart_date == "" && $reend_date == ""){
    $date1 = date_create($holiday_date1);
    $date2 = date_create($holiday_date2);

    $diff = date_diff($date1,$date2);
}else{
    $date1 = date_create($restart_date);
    $date2 = date_create($reend_day);

    $diff = date_diff($date1,$date2);
}

$diff_day = $diff->format("%a")+1;
// echo $diff_day; exit;

if ($restart_date == "") {
    $restart_date = "none";
}

if ($restart_day == "") {
    $restart_day = "none";
}

if ($reend_date == "") {
    $reend_date = "none";
}

if ($reend_day == "") {
    $reend_day = "none";
}

$sql = "UPDATE holidays SET f_holiday_name='$holiday_name', f_start_date='$holiday_date1', f_start_day='$holiday_day1', f_end_date='$holiday_date2', f_end_day='$holiday_day2', f_restart_date='$restart_date', f_restart_day='$restart_day', f_reend_date='$reend_date', f_reend_day='$reend_day', f_duplicate='$duplicate', f_total_holiday='$diff_day', f_modified_date='$now' WHERE f_id='$holiday_id'";
$result = mysqli_query($conn, $sql); 

if($result){
    echo "<script>alert('Holiday Details Updated Success');</script>";
    echo "<script>window.location.href='../../../employee/holiday.php';</script>";
}else{
    echo "<script>alert('Holiday Details Updated Failed');</script>";
    echo "<script>window.location.href='../../../employee/holiday.php';</script>";
}


$dbh = null;

// }

?>