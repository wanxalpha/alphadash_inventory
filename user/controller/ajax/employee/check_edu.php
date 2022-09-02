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

$sql = "SELECT * FROM education_background WHERE f_delete='N' AND f_emp_id='$emp_id'";
$result = mysqli_query($conn, $sql); 
$num_rows = mysqli_num_rows($result);

// if($num_rows == 0){
    // $response = json_encode(array('success'=>'1','i'=>$i,'sql'=>$sql));
    // $response = json_encode(array('success'=>'1','emp_id'=>$emp_id));
    // $response = json_encode(array('success'=>'1','num_rows'=>$num_rows));
// }else{
    // $response = json_encode(array('success'=>'0','emp_id'=>'0'));
    // $response = json_encode(array('success'=>'0','num_rows'=>$num_rows));
// }
$response = json_encode(array('success'=>'1','num_rows'=>$num_rows));

echo $response;    

$dbh = null;

?>