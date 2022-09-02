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
$claim_month = trim($_GET["claim_month"]);
$claim_date = trim($_GET["claim_date"]);
$claim_type = trim($_GET["claim_type"]);
$claim_amt = trim($_GET["claim_amt"]);
$claim_remarks = trim($_GET["claim_remarks"]);

$query = "INSERT INTO claims (f_emp_id, f_claim_type, f_claim_info, f_claim_month, f_status, f_claim_amt, f_claim_date, f_created_date, f_modified_date) VALUES ('$emp_id', '$claim_type', '$claim_remarks', '$claim_month', 'Pending', '$claim_amt', '$claim_date', '$now', '$now')";
// echo $query; exit;
$result = mysqli_query($conn, $query); 

if($result){
    $response = json_encode(array('success'=>'1','emp_id'=>$emp_id));
}else{
    $response = json_encode(array('success'=>'0','emp_id'=>'0'));
}

echo $response;    

$dbh = null;

?>