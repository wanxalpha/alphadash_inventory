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

$emp_id = htmlspecialchars($_POST['emp_code']);
$leave_type = htmlspecialchars($_POST['leave_type']);
$half_day = htmlspecialchars($_POST['half_day']);

if ($half_day == "on") {
    // echo 'ok'; exit;
    $start_date = htmlspecialchars($_POST['choose_date']);
    $end_date = htmlspecialchars($_POST['choose_date']);
    $start_time = htmlspecialchars($_POST['time_one']);
    $end_time = htmlspecialchars($_POST['time_two']);
    $day_count = '0.5';
} else {
    // echo 'ok2'; exit;
    $start_date = htmlspecialchars($_POST['starting_at']);
    $end_date = htmlspecialchars($_POST['ends_on']);
    $start_time = '00:00:00';
    $end_time = '23:59:59';
    $day_count = htmlspecialchars($_POST['days_count']);
    
}

$reason = htmlspecialchars($_POST['reason']);
// $file_name = htmlspecialchars($_POST['leave_image']);

$file = $_FILES['picture_image']['name'];
// echo $file; exit;
$file_loc = $_FILES['picture_image']['tmp_name'];
$folder = "../leave/";
$file2 = strtotime($now);
$final_file = str_replace(' ', '-', $file2);
$final_file2 = 'leave_' . $final_file . '.jpg';

if (move_uploaded_file($file_loc, $folder . $final_file2)) {
    $image = $final_file;
}

$sql = "INSERT INTO leaves (f_emp_id, f_leave_type, f_start_date, f_end_date, f_start_time, f_end_time, f_total, f_reason, f_status, f_image, f_created_date, f_modified_date) VALUES ('$emp_id', '$leave_type', '$start_date', '$end_date', '$start_time', '$end_time', '$day_count', '$reason', 'Pending', '$final_file2', '$now', '$now')";
// echo $sql;exit;
$result = mysqli_query($conn, $sql);
if ($result) {
    echo '1'; 
} else {
    echo '0';
}

$dbh = null;
