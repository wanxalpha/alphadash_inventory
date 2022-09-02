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

$expense = trim($_GET['expense']);
$status = trim($_GET['expense_status']);

$sql = "UPDATE purchase SET f_status='$status', f_modified_date='$now' WHERE f_emp_id='$expense'";

$result = mysqli_query($conn, $sql); 

if($result){
    echo '1';
}else{
    echo '0';
}


$dbh = null;

// }

?>