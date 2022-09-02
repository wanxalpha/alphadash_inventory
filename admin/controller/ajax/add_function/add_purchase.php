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
$purchase_paid = trim($_GET["purchase_paid"]);
$purchase_date = trim($_GET["purchase_date"]);
$purchase_item = trim($_GET["purchase_item"]);
$purchase_from = trim($_GET["purchase_from"]);
$purchase_amt = trim($_GET["purchase_amt"]);

$query = "INSERT INTO purchase (f_emp_id, f_purchase_name, f_purchase_from, f_purchase_date, f_purchase_amt, f_paid_by, f_status, f_created_date, f_modified_date) VALUES ('$emp_id', '$purchase_item', '$purchase_from', '$purchase_date', '$purchase_amt', '$purchase_paid', 'Pending', '$now', '$now')";
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