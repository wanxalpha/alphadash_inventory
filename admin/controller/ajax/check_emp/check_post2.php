<?php

include_once '../../../include/config.php';

$emp_id = trim($_GET["emp_id"]);

$dep_post = array();

if (strlen($emp_id) > 0) {

    $sql = "SELECT * FROM employees WHERE f_emp_id='$emp_id' AND f_delete='N'";
    $result = mysqli_query($conn,$sql);
 
    while( $row = mysqli_fetch_array($result) ){

        $department = $row['f_department'];
        $designation = $row['f_designation'];     

        $sql2 = "SELECT * FROM departments WHERE f_id='$department'";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_array($result2);

        $sql3 = "SELECT * FROM designations WHERE f_id='$designation'";
        $result3 = mysqli_query($conn,$sql3);
        $row3 = mysqli_fetch_array($result3);

        $dep_name = $row2['f_department'];
        $post_name = $row3['f_position'];

        
        $dep_post = array('dep_name'=>$dep_name, 'post_name'=>$post_name);
       
    }
}

echo json_encode($dep_post);

$dbh = null;
?>