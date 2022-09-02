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

$emp_id = trim($_GET["emp_id"]);
$i = trim($_GET["i"]);
$skill_type = trim($_GET["skill_type"]);
$skill_exp = trim($_GET["skill_exp"]);


$sql = "UPDATE education_background SET f_skill$i='$skill_type', f_skill_exp$i='$skill_exp', f_modified_date='$now' WHERE f_emp_id='$emp_id'";
// echo $sql; exit;
$result = mysqli_query($conn, $sql); 

if($result){
    $response = json_encode(array('success'=>'1','i'=>$i,'sql'=>$sql));
    // $response = json_encode(array('success'=>'1','emp_id'=>$emp_id));
}else{
    $response = json_encode(array('success'=>'0','emp_id'=>'0'));
}

echo $response;    

$dbh = null;

?>