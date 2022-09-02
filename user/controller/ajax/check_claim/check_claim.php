<?php

include_once '../../../include/config.php';

$claim_edit = trim($_GET["claim_edit"]);


$sql = "SELECT a.f_id, a.f_claim_month, a.f_claim_type, a.f_claim_date, a.f_claim_amt, a.f_claim_info, b.f_full_name, d.f_department, e.f_position FROM claims a LEFT JOIN employees b ON a.f_emp_id=b.f_id LEFT JOIN claim_type c ON a.f_claim_type=c.f_id LEFT JOIN departments d ON b.f_department=d.f_id LEFT JOIN designations e ON b.f_designation=e.f_id WHERE b.f_delete='N' AND a.f_id=:claim_edit";
$query = $dbh->prepare($sql);
$query->bindParam(':claim_edit', $claim_edit);
$query->execute();

$data = $query->fetch(PDO::FETCH_ASSOC);

echo json_encode($data);

$dbh = null;
?>