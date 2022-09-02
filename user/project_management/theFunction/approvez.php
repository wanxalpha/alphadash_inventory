<?php
include '../connection/config.php';

$idd = $_POST['idd'];
$projectId = $_POST['projectId'];
$taskId = $_POST['taskId'];
$idCom = $_POST['idCom'];
$stat = $_POST['stat'];
$typeApp = $_POST['typeApp'];
$transferTo = $_POST['transferTo'];

if ($stat == "YES"){
    $statusz = "APPROVED";
}else{
    $statusz = "REJECT";
}

$sql = "UPDATE `approval_pro` SET `action_app`='$statusz' WHERE id='$idd'"; 

if(mysqli_query($connect, $sql)){
    if ($statusz == "APPROVED"){
        if ($typeApp == "TRANSFER"){
            // $sqlData = "SELECT * FROM job_task WHERE BIL='$taskId' AND PROJECT_ID='$projectId' AND f_id_com='$idCom'";
            // if(mysqli_query($connect, $sqlData)){
            $sqlT = "UPDATE `job_task` SET `MEMBER_NAME`='$transferTo' WHERE BIL='$taskId' AND PROJECT_ID='$projectId' AND f_id_com='$idCom'"; 
            if (mysqli_query($connect, $sqlT)){
                $response = 100;
            }else{
                $response = 200;
            }
            // }
        }elseif ($typeApp == "DELETED"){
            $sqlD = "DELETE FROM `job_task` WHERE BIL='$taskId' AND PROJECT_ID='$projectId' AND f_id_com='$idCom'"; 
            if (mysqli_query($connect, $sqlD)){
                $response = 100;
            }else{
                $response = 200;
            }
        }elseif ($typeApp == "COMPLETED"){
            $sqlC = "UPDATE `job_task` SET `PROJECT_STATUS`='100', `PROJECT_REMARKS`='COMPLETED' WHERE BIL='$taskId' AND PROJECT_ID='$projectId' AND f_id_com='$idCom'"; 
            if (mysqli_query($connect, $sqlC)){
                $response = 100;
            }else{
                $response = 200;
            }

            // $sqlC = "SELECT * FROM `job_task` WHERE BIL='$taskId' AND PROJECT_ID='$projectId' AND f_id_com='$idCom'"; 
            // if(mysqli_query($connect, $sqlC)){
            //     $response = 100;
            // }
        }
    }else{
        $response = 100;
    }
}else{
    $response = 200;
}

$result = json_encode($response);
echo $result;
?>