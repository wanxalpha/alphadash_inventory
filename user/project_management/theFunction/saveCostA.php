<?php
include '../connection/config.php';

$totalA = $_POST['totalA'];
$projectId = $_POST['projectId'];
$costName = $_POST['costName'];

$definit = $_POST['definit'];
$titler = $_POST['titler'];
$quanti = $_POST['quanti'];
$rater = $_POST['rater'];
$totalMan = $_POST['totalMan'];
$totaler = $_POST['totaler'];

$theSST = $_POST['theSST'];
$theDiscount = $_POST['theDiscount'];

$sql = "INSERT INTO `project_value`(`project_costing`, `project_definition`, `project_title`, `project_quality`, `project_rate`, `project_total_man`, `project_total`, `project_id`, `project_total_cost`, `project_sst`, `project_discount`) 
VALUES ('$costName','$definit','$titler','$quanti','$rater','$totalMan','$totaler','$projectId','$totalA','$theSST','$theDiscount')";
if(mysqli_query($connect, $sql)){
    $response = 100;
}else{
    $response = 200;
}

$result = json_encode($response);
echo $result;


?>