<?php
include '../connection/config.php';

$projectId = $_POST['projectId'];
$projectManager = $_POST['pm'];
$startDate = $_POST['sd'];
$endDate = $_POST['ed'];
$priorit = $_POST['priorit'];
$grandTotal = $_POST['grandTotal'];
$proDesc = $_POST['proDesc'];
$teamNamez = $_POST['teamNamez'];

$sql = "UPDATE `sales_funnel` SET `project_team`='$teamNamez', `project_manager`='$projectManager',`project_start`='$startDate',`project_due_date`='$endDate', `project_priority`='$priorit', `value`='$grandTotal', `project_detail`='$proDesc', `assign_task`='Yes', `status`='ON-GOING' WHERE id='$projectId'";
if(mysqli_query($connect, $sql)){
    $response = 100;
}else{
    $response = 200;
}

$result = json_encode($response);
echo $result;


?>