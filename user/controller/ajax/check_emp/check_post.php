<?php

include_once '../../../includes/config.php';

$emp_id = trim($_GET["emp_id"]);

// $gender = array();

if (strlen($gender) > 0) {

    $sql = "SELECT * FROM employees WHERE f_emp_id='$emp_id' AND f_delete='N'";

    $result = mysqli_query($conn,$sql);
 
    while( $row = mysqli_fetch_array($result) ){

       $designation = $row['f_designation'];
       
    }
}

echo json_encode($designation);

$dbh = null;
?>