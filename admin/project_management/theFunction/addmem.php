<?php
include '../connection/config.php';

$id = $_POST['id'];
$username = $_POST['username'];
$fullName = $_POST['fullName'];
$position = $_POST['position'];
$department = $_POST['department'];

$sql = "INSERT INTO `project_member`(`f_id`, `f_name`, `l_name`, `f_position`, `f_department`) 
VALUES ('$id','$username','$fullName','$position','$department')";
if(mysqli_query($connect, $sql)){
    $response = 100;
}else{
    $response = 200;
}

$result = json_encode($response);
echo $result;
?>