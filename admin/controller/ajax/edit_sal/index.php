<?php

include_once '../../../includes/config.php';

$pay_edit = trim($_GET["pay_edit"]);

// if (strlen($emp_edit) > 0) {

    $sql = "SELECT a.f_id AS main_id, a.f_username AS username, b.f_salary AS salary FROM employees a LEFT JOIN bank_slip b ON a.f_emp_id = b.f_emp_id WHERE a.f_delete='N' AND a.f_id=:pay_edit";
    $query = $dbh->prepare($sql);
    $query->bindParam(':pay_edit', $pay_edit);
    $query->execute();
    
    $data = $query->fetch(PDO::FETCH_ASSOC);

    echo json_encode($data);

$dbh = null;
?>