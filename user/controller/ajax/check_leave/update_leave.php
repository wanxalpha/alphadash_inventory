<?php

include_once '../../../includes/config.php';

mysqli_set_charset($conn, "utf8");

date_default_timezone_set("Asia/Kuala_Lumpur");
$t = time();
$now = date("Y-m-d H:i:s", $t);
$curdate = date("Y-m-d", $t);
$year = date("Y", $t);
$hour = date("H", $t);
$minute = date("i", $t);

$leave = $_GET['leave'];
$leave_status = $_GET['leave_status'];
$leave_reason = $_GET['leave_reason'];

if (strlen($leave) > 0) {

    $sql = "UPDATE leaves SET f_status='$leave_status', f_remarks='$leave_reason', f_modified_date='$now' WHERE f_id='$leave'";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo '1';
    }else{
        echo '0';
    }
}

$dbh = null;

?>