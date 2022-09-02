<?php

include_once '../../../includes/config.php';

$emp_edit = trim($_GET["emp_edit"]);

// if (strlen($emp_edit) > 0) {

    $sql = "SELECT f_id, f_full_name, f_username, f_email, f_emp_id, f_contact FROM employees WHERE f_id=:emp_edit";
    $query = $dbh->prepare($sql);
    $query->bindParam(':emp_edit', $emp_edit);
    $query->execute();
    
    $data = $query->fetch(PDO::FETCH_ASSOC);

    echo json_encode($data);

$dbh = null;
?>