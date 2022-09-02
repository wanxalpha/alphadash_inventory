<?php
    include '../connection/config.php';

    $id = $_POST['id'];
    $nameFrom = $_POST['namef'];
    $nameTo = $_POST['namet'];

    $sql = "UPDATE `job_task` SET `MEMBER_NAME`='$nameTo' WHERE PROJECT_ID = '$id' AND MEMBER_NAME='$nameFrom'";
    if(mysqli_query($connect, $sql)){
        $response = 100;
    }else{
        $response = 200;
    }
    $result = json_encode($response);
    echo $result;

?>