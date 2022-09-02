<?php

include_once '../../../include/config.php';

mysqli_set_charset($conn, "utf8");

date_default_timezone_set("Asia/Kuala_Lumpur");
$t = time();
$now = date("Y-m-d H:i:s", $t);
$curdate = date("Y-m-d", $t);
$year = date("Y", $t);
$hour = date("H", $t);
$minute = date("i", $t);

$claim = $_GET['claim'];
$claim_status = $_GET['claim_status'];
$claim_reason = $_GET['reason'];

if (strlen($claim) > 0) {

    $sql = "UPDATE claims SET f_status='$claim_status', f_remarks='$claim_reason', f_modified_date='$now' WHERE f_id='$claim'";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo '1';
    }else{
        echo '0';
    }
}

$dbh = null;

?>