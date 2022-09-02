<?php

include_once '../../../include/config.php';

$gender = trim($_GET["employees"]);

$leave_type = array();

if (strlen($gender) > 0) {

    $sql = "SELECT * FROM employees WHERE f_emp_id='$gender' AND f_delete='N'";
    // echo $sql;
    $result = mysqli_query($conn,$sql);
 
    while( $row = mysqli_fetch_array($result) ){
       $staff_gender = $row['f_gender'];
     
       if($staff_gender == "Female"){
           $sql2 = "SELECT * FROM leave_type WHERE f_delete='N'";
           $result = mysqli_query($conn,$sql2);

            while( $row = mysqli_fetch_array($result) ){
                $leave_id = $row['f_id'];
                $leave_name = $row['f_leave_name'];
        
                $leave_type[] = array("id" => $leave_id, "name" => $leave_name, "gender" => $staff_gender);
            }
       }elseif($staff_gender == "Male"){
            $sql3 = "SELECT * FROM leave_type WHERE f_leave_gender='B' AND f_delete='N'";
            $result = mysqli_query($conn,$sql3);

            while( $row = mysqli_fetch_array($result) ){
                $leave_id = $row['f_id'];
                $leave_name = $row['f_leave_name'];
        
                $leave_type[] = array("id" => $leave_id, "name" => $leave_name, "gender" => $staff_gender);
            }
       }
    }
}

echo json_encode($leave_type);

$dbh = null;
?>