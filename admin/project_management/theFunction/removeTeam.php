<?php
include '../connection/config.php';

$id = $_POST['id'];
$temer = $_POST['protin'];
$nameRe = $_POST['teamNamezc'];
$str_arrz = preg_split ("/\,/", $temer); 
foreach ($str_arrz as $sellsdz) {
    if ($sellsdz == $nameRe){

    }else{
        if ($sellsdz == "" || $sellsdz == " " || $sellsdz == null){
        }else{
            $teamProName .= $sellsdz . ",";
        }
    }
}
// echo $teamProName;
// exit;
$sqlUpdate = "UPDATE `sales_funnel` SET `project_team`='$teamProName' WHERE id='$id'";
if(mysqli_query($connect, $sqlUpdate)){
$sqlDelete = "DELETE FROM `project_assign` WHERE project_id='$id' AND project_assign='$nameRe'";
if(mysqli_query($connect, $sqlDelete)){
   
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