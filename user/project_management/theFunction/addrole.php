<?php
include '../connection/config.php';

$id = $_POST['id'];
$username = $_POST['username'];
$idCOmpany = $_POST['idCOmpany'];

$sql = "UPDATE `project_member` SET `f_designation`='$id', f_id_com='$idCOmpany' WHERE f_bil='$username' "; 

if(mysqli_query($connect, $sql)){
    $response = 100;
}else{
    $response = 200;
}

$result = json_encode($response);
echo $result;
?>