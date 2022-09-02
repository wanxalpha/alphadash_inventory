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

$decline = $_GET['decline'];

if (strlen($decline) > 0) {

    $sql = "UPDATE facility SET f_delete='Y', f_modified_date='$now' WHERE f_id='$decline'";
    $result = mysqli_query($conn, $sql);

    if($result){
        $response = json_encode(array('success'=>'1'));
    }else{
        $response = json_encode(array('success'=>'0'));
    }
}

echo $response;

$dbh = null;

?>