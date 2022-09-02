<?php
//insert.php;
include_once '../../../include/config.php';

mysqli_set_charset($conn, "utf8");

date_default_timezone_set("Asia/Kuala_Lumpur");
$t = time();
$now = date("Y-m-d H:i:s", $t);
$curdate = date("Y-m-d", $t);
$year = date("Y", $t);
$hour = date("H", $t);
$minute = date("i", $t);

$emp_id = htmlspecialchars($_POST['employee']);
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

$filename = $_FILES['picture_image']['name'];
// echo $file; exit;

/* Location */
$location = "../../../upload/leaves/".$filename;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
$imageFileType = strtolower($imageFileType);

/* Valid extensions */
$valid_extensions = array("jpg","jpeg","png","pdf");

$status = 0;
/* Check file extension */
if(in_array(strtolower($imageFileType), $valid_extensions)) {
   /* Upload file */
   if(move_uploaded_file($_FILES['picture_image']['tmp_name'],$location)){
        $status = 1;
   }
}

if($status == 1){
    $sql = "INSERT INTO leaves (f_emp_id, f_leave_type, f_start_date, f_end_date, f_start_time, f_end_time, f_total, f_reason, f_status, f_image, f_created_date, f_modified_date) VALUES ('$emp_id', '$leave_type', '$start_date', '$end_date', '$start_time', '$end_time', '$day_count', '$reason', 'Pending', '$filename', '$now', '$now')";
    // echo $sql;exit;
    $result = mysqli_query($conn, $sql);
    if ($result) {
    
        echo "<script>alert('Leaves Has Been Added');</script>";
        echo "<script>window.location.href='../../../employee/leaves.php';</script>";
    } else {
        echo "<script>alert('Something went wrong');</script>";
    }
}else{
    echo "<script>alert('Upload Leaves Error');</script>";
    echo "<script>window.location.href='../../../employee/leaves.php';</script>";
}



?>