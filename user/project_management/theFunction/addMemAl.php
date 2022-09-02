<?php
include '../connection/config.php';

$name = $_POST['ids'];
// $username = $_POST['username'];
// $fullName = $_POST['fullName'];
// $position = $_POST['position'];
// $department = $_POST['department'];
$sqlSe = "SELECT * FROM `employees` WHERE f_first_name='$name'";
$resultSe = mysqli_query($connect, $sqlSe);
$numSe = mysqli_num_rows($resultSe);
if ($numSe > 0){
    $rowSe = mysqli_fetch_assoc($resultSe);
    $id = $rowSe['f_id'];
    $firstName = $rowSe['f_first_name'];
    $LastName = $rowSe['f_last_name'];
    $position = $rowSe['f_designation'];
    $department = $rowSe['f_id'];

    $sqlPos = "SELECT * FROM designations WHERE f_id='$position'";
    $rePos = mysqli_query($connect, $sqlPos);
    $rowPos = mysqli_fetch_assoc($rePos);
    $positionz = $rowPos['f_position'];

    $sqlDep = "SELECT * FROM departments WHERE f_id='$department'";
    $reDep = mysqli_query($connect, $sqlDep);
    $rowDep = mysqli_fetch_assoc($reDep);
    $departmentz = $rowDep['f_department'];

    $sql = "INSERT INTO `project_member`(`f_id`, `f_name`, `l_name`, `f_position`, `f_department`) 
    VALUES ('$id','$firstName','$LastName','$positionz','$departmentz')";
    if(mysqli_query($connect, $sql)){
        $response = 100;
    }else{
        $response = 200;
    }
}



$result = json_encode($response);
echo $result;
?>