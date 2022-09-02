<?php

include_once '../../../includes/config.php';

$claim = $_GET['claim'];
$claim_status = $_GET['claim_status'];

if (strlen($claim) > 0) {

    $sql = "UPDATE claims SET f_status='$claim_status' WHERE f_id='$claim'";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo '1';
    }else{
        echo '0';
    }
}

$dbh = null;

?>