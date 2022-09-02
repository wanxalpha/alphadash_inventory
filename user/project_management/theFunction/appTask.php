<?php
include '../connection/config.php';

// $idd = $_POST['idd'];
$projectId = $_POST['projectId'];

$nameApp = $_POST['nameApp'];
$typeApp = $_POST['typeApp'];
$designation = $_POST['designation'];
$remarksApp = $_POST['remarksApp'];
$transferTo = $_POST['transferTo'];

// $projectName = $_POST['projectName'];
// $taskName = $_POST['taskName'];
$taskId = $_POST['taskId'];
$idCom = $_POST['idCom'];

$sqlCheck = "SELECT * FROM `job_task` WHERE BIL='$taskId'";
$reCheck = mysqli_query($connect, $sqlCheck);
$numCheck = mysqli_num_rows($reCheck);
if ($numCheck > 0){
    $rowCheck = mysqli_fetch_assoc($reCheck);
    $projectName = $rowCheck['PROJECT_NAME'];
    $taskName = $rowCheck['JOB_TASK'];
    // $response = 100;
    $sql = "INSERT INTO `approval_pro`(`name_app`, `type_app`, `designation_app`, `remarks_app`, `tarnsfer_to`, `project_id`, `project_name`, `task_name`, `task_id`, `f_id_com`) VALUES ('$nameApp', '$typeApp','$designation','$remarksApp', '$transferTo','$projectId', '$projectName', '$taskName', '$taskId','$idCom')"; 

    if(mysqli_query($connect, $sql)){
        $sqlUpdate = "UPDATE `job_task` SET `f_status`='$typeApp' WHERE BIL='$taskId'";
        if (mysqli_query($connect, $sqlUpdate)){
            $response = 100;
        }else{
            $response = 200;
        }
      
    }else{
        $response = 200;
    }

}else{
    $response = 200;
}


$result = json_encode($response);
echo $result;
?>