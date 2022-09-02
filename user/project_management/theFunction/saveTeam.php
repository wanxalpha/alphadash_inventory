<?php
include '../connection/config.php';

$scopeOfWork = $_POST['scop'];
$namaTeam = $_POST['nama'];
$roles = $_POST['roles'];
$periodWork = $_POST['perios'];
$tarikh = $_POST['tarikh'];
$projectId = $_POST['namepro'];
$idd = $_POST['id'];

$proManager = $_POST['proManager'];
$proDetail = $_POST['proDetail'];
$proPillar = $_POST['proPillar'];
$proPro = $_POST['proPro'];

$temer = $_POST['protin'];
$teamProName = $temer;
$teamProName .= $namaTeam . ",";
// $str_arrz = preg_split ("/\,/", $temer); 
// foreach ($str_arrz as $sellsdz) {
//         if ($sellsdz == "" || $sellsdz == " " || $sellsdz == null){
//         }else{
//             $teamProName .= $sellsdz . ",";
//         }
// }
if ($roles == "PIC"){
    $sqlPic = "UPDATE `sales_funnel` SET `pic_name`='$namaTeam' WHERE id='$idd'";
    $resultPic = mysqli_query($connect, $sqlPic);

}

$sql = "INSERT INTO `project_assign`(`project_scope`, `project_assign`, `project_role`, `project_duration`, `project_handover`, `project_name`, `project_status`,`project_start`, `project_manager`, `project_detail`, `project_pillar`,`project_priority`,`project_id`) 
VALUES ('$scopeOfWork','$namaTeam','$roles','$periodWork','$tarikh','$projectId','ON-GOING',current_timestamp(),'$proManager','$proDetail','$proPillar','$proPro','$idd')";
if(mysqli_query($connect, $sql)){
    $sqlUpdate = "UPDATE `sales_funnel` SET `project_team`='$teamProName' WHERE id='$idd'";
    if(mysqli_query($connect, $sqlUpdate)){
        $response = 100;
    }else{
        $response = 200;
    }
}else{
    $response = 200;
}

$result = json_encode($response);
echo $result;


?>