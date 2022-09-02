<?php
include '../connection/config.php';

$proName = $_POST['proName'];
$proCode = $_POST['proCode'];
$proDetail = $_POST['proDetail'];
$idCOmpany = $_POST['idCOmpany'];

    $sql = "INSERT INTO `project_pillar`(`project_pillar`, `project_code`, `project_detail`, `created_at`, `f_id_com`) 
    VALUES ('$proName','$proCode','$proDetail', current_timestamp(),'$idCOmpany')";
    if(mysqli_query($connect, $sql)){
        $response = 100;
    }else{
        $response = 200;
    }

$result = json_encode($response);
echo $result;
?>