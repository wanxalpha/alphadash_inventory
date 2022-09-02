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

$holiday_name = htmlspecialchars($_POST['holiday_name']);
$holiday_date1 = htmlspecialchars($_POST['holiday_date1']);
$holiday_day1 = htmlspecialchars($_POST['holiday_day1']);
$holiday_date2 = htmlspecialchars($_POST['holiday_date2']);
$holiday_day2 = htmlspecialchars($_POST['holiday_day2']);
$restart_date = htmlspecialchars($_POST['restart_date']);
$restart_day = htmlspecialchars($_POST['restart_day']);
$reend_date = htmlspecialchars($_POST['reend_date']);
$reend_day = htmlspecialchars($_POST['reend_day']);
$duplicate = htmlspecialchars($_POST['duplicate']);

// echo $holiday_date1."<br>".$holiday_date2."<br>";

if($restart_date == "" && $reend_date == ""){
    // $date1 = date("Y-m-d", strtotime($holiday_date1));
    // $date2 = date("Y-m-d", strtotime($holiday_date2));
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

$sql = "INSERT INTO holidays(f_holiday_name, f_start_date, f_start_day, f_end_date, f_end_day, f_restart_date, f_restart_day, f_reend_date, f_reend_day, f_duplicate, f_total_holiday, f_created_date, f_modified_date) VALUES ('$holiday_name', '$holiday_date1', '$holiday_day1', '$holiday_date2', '$holiday_day2', '$restart_date', '$restart_day', '$reend_date', '$reend_day', '$duplicate', '$diff_day', '$now', '$now')";
// echo $sql; exit;
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "<script>alert('Holiday Has Been Added');</script>";
    echo "<script>window.location.href='../../../employee/holiday.php';</script>";
} else {
    echo "<script>alert('Something Went Wrong.');</script>";
}


$dbh = null;

// }
