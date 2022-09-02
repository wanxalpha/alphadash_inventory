<?php
include '../connection/config.php';

$jobName = $_POST['jobT'];
$codLang = $_POST['codLang'];
$modPages = $_POST['modPages'];
$tarikh = $_POST['tarikh'];
$nama = $_POST['nama'];
$projectName = $_POST['projeckName'];

$sql = "UPDATE `job_task` SET `CO_LANG`='$codLang',`MOD_PAG`='$modPages',`DATE_COMPLETE`='$tarikh' WHERE MEMBER_NAME='$nama' AND PROJECT_NAME='$projectName' AND JOB_TASK='$jobName'";
if(mysqli_query($connect, $sql)){
    $response = 100;
}else{
    $response = 200;
}

$result = json_encode($response);
echo $result;


?>