<?php
include '../connection/config.php';

$idPro = $_POST['idPro'];
$idCom = $_POST['idCom'];
$proName = $_POST['proName'];
$proStart = $_POST['proStart'];
$proEnd = $_POST['proEnd'];
$ipStart = $_POST['ipStart'];
$ipEnd = $_POST['ipEnd'];
$troStart = $_POST['troStart'];
$troEnd = $_POST['troEnd'];
// $idCom = $_POST['idCom'];
$uatStart = $_POST['uatStart'];
$uatEnd = $_POST['uatEnd'];
$comStart = $_POST['comStart'];
$comEnd = $_POST['comEnd'];
$penStart = $_POST['penStart'];
$penEnd = $_POST['penEnd'];
$supStart = $_POST['supStart'];
$supEnd = $_POST['supEnd'];

$sqlCheck = "SELECT * FROM  `gant_chart` WHERE project_id='$idPro' AND f_id_com='$idCom'";
$resultCheck = mysqli_query($connect, $sqlCheck);
$numCheck = mysqli_num_rows($resultCheck);
if ($numCheck > 0){
    $rowCheck = mysqli_fetch_assoc($resultCheck);
    if($proStart == "" || $proStart == null){
        $proStart = $rowCheck['pro_start_1'];
    }
    if($proEnd == "" || $proEnd == null){
        $proEnd = $rowCheck['pro_start_2'];
    }
    if($ipStart == "" || $ipStart == null){
        $ipStart = $rowCheck['pro_ip_1'];
    }
    if($ipEnd == "" || $ipEnd == null){
        $ipEnd = $rowCheck['pro_ip_2'];
    }
    if($troStart == "" || $troStart == null){
        $troStart = $rowCheck['pro_tro_1'];
    }
    if($troEnd == "" || $troEnd == null){
        $troEnd = $rowCheck['pro_tro_2'];
    }
    if($uatStart == "" || $uatStart == null){
        $uatStart = $rowCheck['pro_uat_1'];
    }
    if($uatEnd == "" || $uatEnd == null){
        $uatEnd = $rowCheck['pro_uat_2'];
    }
    if($comStart == "" || $comStart == null){
        $comStart = $rowCheck['pro_com_1'];
    }
    if($comEnd == "" || $comEnd == null){
        $comEnd = $rowCheck['pro_com_2'];
    }
    if($penStart == "" || $penStart == null){
        $penStart = $rowCheck['pro_pen_1'];
    }
    if($penEnd == "" || $penEnd == null){
        $penEnd = $rowCheck['pro_pen_2'];
    }
    if($supStart == "" || $supStart == null){
        $supStart = $rowCheck['pro_sup_1'];
    }
    if($supEnd == "" || $supEnd == null){
        $supEnd = $rowCheck['pro_sup_2'];
    }

    $sql = "UPDATE `gant_chart` SET `pro_start_1`='$proStart', `pro_start_2`='$proEnd', `pro_ip_1`='$ipStart', `pro_ip_2`='$ipEnd', `pro_tro_1`='$troStart', `pro_tro_2`='$troEnd', `pro_uat_1`='$uatStart', `pro_uat_2`='$uatEnd', `pro_com_1`='$comStart', `pro_com_2`='$comEnd', `pro_pen_1`='$penStart', `pro_pen_2`='$penEnd', `pro_sup_1`='$supStart', `pro_sup_2`='$supEnd' WHERE project_id='$idPro' AND f_id_com='$idCom'";
    if(mysqli_query($connect, $sql)){
        $response = 100;
    }else{
        $response = 200;
    }
}else{
    if($proStart == "" || $proStart == null){
        $proStart = "0";
    }
    if($proEnd == "" || $proEnd == null){
        $proEnd = "0";
    }
    if($ipStart == "" || $ipStart == null){
        $ipStart = "0";
    }
    if($ipEnd == "" || $ipEnd == null){
        $ipEnd = "0";
    }
    if($troStart == "" || $troStart == null){
        $troStart = "0";
    }
    if($troEnd == "" || $troEnd == null){
        $troEnd = "0";
    }
    if($uatStart == "" || $uatStart == null){
        $uatStart = "0";
    }
    if($uatEnd == "" || $uatEnd == null){
        $uatEnd = "0";
    }
    if($comStart == "" || $comStart == null){
        $comStart = "0";
    }
    if($comEnd == "" || $comEnd == null){
        $comEnd = "0";
    }
    if($penStart == "" || $penStart == null){
        $penStart = "0";
    }
    if($penEnd == "" || $penEnd == null){
        $penEnd = "0";
    }
    if($supStart == "" || $supStart == null){
        $supStart = "0";
    }
    if($supEnd == "" || $supEnd == null){
        $supEnd = "0";
    }

    $sql = "INSERT INTO `gant_chart`(`project_name`, `pro_start_1`, `pro_start_2`, `pro_ip_1`, `pro_ip_2`, `pro_tro_1`, `pro_tro_2`, `pro_uat_1`, `pro_uat_2`, `pro_com_1`, `pro_com_2`, `pro_pen_1`, `pro_pen_2`, `pro_sup_1`, `pro_sup_2`, `project_id`, `f_id_com`) VALUES ('$proName','$proStart','$proEnd','$ipStart','$ipEnd','$troStart','$troEnd','$uatStart','$uatEnd','$comStart','$comEnd','$penStart','$penEnd','$supStart','$supEnd','$idPro','$idCom')";
    if(mysqli_query($connect, $sql)){
        $response = 100;
    }else{
        $response = 200;
    }
}


$result = json_encode($response);
echo $result;


?>