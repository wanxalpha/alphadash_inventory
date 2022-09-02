<?php
include '../connection/config.php';

$idTask = $_POST['idTask'];
$lnagu = $_POST['lnagu'];
$staus = $_POST['staus'];
$prog = $_POST['prog'];

$sql = "UPDATE `job_task` SET `CO_LANG`='$lnagu',`PROJECT_STATUS`='$prog',`f_status`='$staus' WHERE BIL='$idTask'";
if(mysqli_query($connect, $sql)){
    $response = 100;
}else{
    $response = 200;
}

$result = json_encode($response);
echo $result;


?>