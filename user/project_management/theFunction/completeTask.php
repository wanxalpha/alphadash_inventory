<?php
include '../connection/config.php';

$idTask = $_POST['idTask'];


    $sqlUpdate = "UPDATE `job_task` SET `DATE_COMPLETE`=current_timestamp(), `PROJECT_STATUS`='100', `PROJECT_REMARKS`='COMPLETED' WHERE BIL='$idTask'";
    if(mysqli_query($connect, $sqlUpdate)){
        $response = 100;
    }else{
        $response = 200;
    }

$result = json_encode($response);
echo $result;


?>