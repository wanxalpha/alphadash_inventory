<?php

include_once '../../../includes/config.php';

$dep_edit = trim($_GET["dep_edit"]);

// if (strlen($emp_edit) > 0) {

    $sql = "SELECT * FROM departments WHERE f_id=:dep_edit";
    $query = $dbh->prepare($sql);
    $query->bindParam(':dep_edit', $dep_edit);
    $query->execute();
    
    $data = $query->fetch(PDO::FETCH_ASSOC);

    echo json_encode($data);

$dbh = null;
?>