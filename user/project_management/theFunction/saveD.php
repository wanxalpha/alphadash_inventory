<?php
include '../connection/config.php';

$projectId = $_POST['idPro'];
$detailtext = $_POST['detailtext'];


$sql = "UPDATE `sales_funnel` SET `project_detail`='$detailtext' WHERE id='$projectId'";
if(mysqli_query($connect, $sql)){
    $response = 100;
}else{
    $response = 200;
}

$result = json_encode($response);
echo $result;


?>