<?php

include_once '../../../include/config.php';

$department = trim($_GET["department"]);

$users_arr = array();

if (strlen($department) > 0) {

    $sql = "SELECT * FROM designations WHERE f_department='$department'";

    $result = mysqli_query($conn,$sql);
 
    while( $row = mysqli_fetch_array($result) ){
       $desc_id = $row['f_id'];
       $desc_post = $row['f_position'];
 
       $users_arr[] = array("id" => $desc_id, "name" => $desc_post);
    }
}

echo json_encode($users_arr);

$dbh = null;
?>