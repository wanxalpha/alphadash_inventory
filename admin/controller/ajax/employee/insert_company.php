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
$company_name = trim($_GET["company_name"]);
$position = trim($_GET["position"]);
$year_exp = trim($_GET["year_exp"]);
$old_salary = trim($_GET["old_salary"]);

$sql = "INSERT INTO education_background (f_emp_id, f_company$i, f_position$i, f_year_exp$i, f_salary$i, f_created_date, f_modified_date) VALUES ('$emp_id', '$company_name', '$position', '$year_exp',  '$old_salary', '$now', '$now')";
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