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

$v_id = htmlspecialchars($_POST["edit_vid"]);
$v_name = htmlspecialchars($_POST["edit_visitor_name"]);
$c_name = htmlspecialchars($_POST["edit_cname"]);
$v_phone = htmlspecialchars($_POST["edit_vphone"]);
$v_email = htmlspecialchars($_POST["edit_vemail"]);
$v_purpose = htmlspecialchars($_POST["edit_vpurpose"]);
$v_date = htmlspecialchars($_POST["edit_vdate"]);

$sql = "UPDATE visitor SET f_visitor_name='$v_name', f_comp_name='$c_name', f_phone_no='$v_phone', f_email='$v_email', f_purpose='$v_purpose', f_date='$v_date', f_modified_date='$now' WHERE f_id='$v_id'";

$result = mysqli_query($conn, $sql); 

if($result){
    echo "<script>alert('Visitor Details Updated Success');</script>";
    echo "<script>window.location.href='../../../employee/visitor.php';</script>";
}else{
    echo "<script>alert('Visitor Details Updated Failed');</script>";
    echo "<script>window.location.href='../../../employee/visitor.php';</script>";
}


$dbh = null;

// }

?>