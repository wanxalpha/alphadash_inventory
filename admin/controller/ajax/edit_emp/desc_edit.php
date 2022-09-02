<?php

include_once '../../../include/config.php';

$dep_edit = trim($_GET["desc_edit"]);

// if (strlen($emp_edit) > 0) {

$sql = "SELECT * FROM designations WHERE f_id=$dep_edit";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($result);

$desc_name = $rows['f_position'];
$desc_code = $rows['f_post_code'];
$dep_list = $rows['f_department'];

echo json_encode(array("desc_name"=>$desc_name, "desc_code"=>$desc_code, "dep_list"=>$dep_list));

$dbh = null;
?>