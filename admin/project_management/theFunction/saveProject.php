<?php
include '../connection/config.php';

$id = $_POST['id'];
$projectName = $_POST['projectName'];
$clientName = $_POST['clientName'];
$companyName = $_POST['companyName'];
$companyAddress = $_POST['companyAddress'];
$contactNo = $_POST['contactNo'];
$emel = $_POST['emel'];
$position = $_POST['position'];
$projectPillar = $_POST['projectPillar'];
$idCOmpany = $_POST['idCOmpany'];

$sqlPillar = "SELECT * FROM project_pillar WHERE project_pillar='$projectPillar'";
$resPillar = mysqli_query($connect, $sqlPillar);
$numPillar = mysqli_num_rows($resPillar);
if ($numPillar > 0){
    $rowPillar = mysqli_fetch_assoc($resPillar);
    $codePillar = '["' . $rowPillar['project_code'] . '"]';
}else{
    $codePillar = "";
}
$sql = "INSERT INTO `sales_funnel`(`project_name`, `customer_name`, `company_name`, `company_address`, `customer_contact`, `customer_email`, `customer_position`, `project_pillar`, `status`, `f_id_com`, `project_receive_date`, `project_dateline`, `project_start`, `project_due_date`, `project_sta`, `project_ip`, `project_trouble`, `project_uat`, `project_com`, `project_pending`, `project_support`) 
VALUES ('$projectName','$clientName','$companyName','$companyAddress','$contactNo','$emel','$position','$codePillar','2','$idCOmpany',current_timestamp(),'0','0','0','0','0','0','0','0','0','0')";
if(mysqli_query($connect, $sql)){
    $sqlid = "SELECT * FROM `sales_funnel` WHERE project_name='$projectName' AND f_id_com='$idCOmpany'";
    $resultId = mysqli_query($connect, $sqlid);
    $numId = mysqli_num_rows($resultId);
    if ($numId > 0){
        $rowId = mysqli_fetch_assoc($resultId);
        $projectID = $rowId['id'];

        $sqle = "INSERT INTO `gant_chart`(`project_name`, `start_date`, `end_date`, `pro_start_1`, `pro_start_2`, `pro_ip_1`, `pro_ip_2`, `pro_tro_1`, `pro_tro_2`, `pro_uat_1`, `pro_uat_2`, `pro_com_1`, `pro_com_2`, `pro_pen_1`, `pro_pen_2`, `pro_sup_1`, `pro_sup_2`, `project_id`, `f_id_com`) 
        VALUES ('$projectName','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','$projectID','$idCOmpany')";
        if(mysqli_query($connect, $sqle)){
            $response = 100;
        }else{
            $response = 200;
        }
    }
}else{
    $response = 200;
}

$result = json_encode($response);
echo $result;
?>