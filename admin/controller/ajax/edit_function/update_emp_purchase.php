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

$review = trim($_GET['review']);
$status = trim($_GET['status']);
$code = trim($_GET['code']);

$sql = "UPDATE purchase SET f_status='$status', f_review1='$code', f_modified_date='$now' WHERE f_id='$review'";
$result = mysqli_query($conn, $sql); 

if($result){
    echo 'ok';
}else{
    echo 'not ok3';
}


$dbh = null;

// }

?>