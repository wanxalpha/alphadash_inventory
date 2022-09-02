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
$study_type = trim($_GET["study_type"]);
$school_name = trim($_GET["school_name"]);
$course = trim($_GET["course"]);
$graduate = trim($_GET["graduate"]);
$result = trim($_GET["result"]);

$sql = "UPDATE education_background SET f_study_type$i='$study_type', f_school_name$i='$school_name', f_course$i='$course', f_grad_year$i='$graduate',f_result$i='$result', f_modified_date='$now' WHERE f_emp_id='$emp_id'";
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