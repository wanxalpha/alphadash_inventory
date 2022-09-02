<?php

include_once '../../../include/config.php';

$leave_edit = trim($_GET["leave_edit"]);

// if (strlen($emp_edit) > 0) {

    // $sql = "SELECT * FROM leaves a LEFT JOIN employees b ON a.f_emp_id = b.f_emp_id WHERE a.f_id=:leave_edit";
    $sql = "SELECT * FROM leaves WHERE f_id=:leave_edit";
    // echo $sql; exit;
    $query = $dbh->prepare($sql);
    $query->bindParam(':leave_edit', $leave_edit);
    $query->execute();
    
    $data = $query->fetch(PDO::FETCH_ASSOC);
// }
// $sql = "SELECT * FROM leaves a LEFT JOIN employees b ON a.f_emp_id = b.f_emp_id WHERE f_id='$leave_edit'";
// echo $sql; exit;


    echo json_encode($data);

$dbh = null;
?>