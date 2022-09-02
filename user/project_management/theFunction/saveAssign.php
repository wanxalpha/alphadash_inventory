<?php
include '../connection/config.php';

$jobName = $_POST['jobName'];
$modul = $_POST['modul'];
$dateStart = $_POST['dateStart'];
$dueDate = $_POST['dueDate'];
$nama = $_POST['nama'];
$projectName = $_POST['projeckName'];

$sql = "INSERT INTO `job_task`(`MEMBER_NAME`, `PROJECT_NAME`, `JOB_TASK`, `DATE_START`, `DUE_DATE`, `MOD_PAG`) 
VALUES ('$nama','$projectName','$jobName','$dateStart','$dueDate','$modul')";
if(mysqli_query($connect, $sql)){
    $response = 100;
}else{
    $response = 200;
}

$result = json_encode($response);
echo $result;


?>