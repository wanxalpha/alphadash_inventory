<?php
include_once("../../../include/config.php");

mysqli_set_charset($conn, "utf8");

date_default_timezone_set("Asia/Kuala_Lumpur");
$t = time();
$now = date("Y-m-d H:i:s", $t);
$curdate = date("Y-m-d", $t);
$year = date("Y", $t);
$hour = date("H", $t);
$minute = date("i", $t);

//personal information	
$identity = htmlspecialchars($_POST['identity']);
$race = htmlspecialchars($_POST['race']);
$religion = htmlspecialchars($_POST['religion']);
$marital = htmlspecialchars($_POST['marital']);

if ($marital == 1) {
    $spouse = "none";
    $children = "0";
} else {
    $spouse = htmlspecialchars($_POST['spouse']);
    $children = htmlspecialchars($_POST['children']);
}

$epf_no = htmlspecialchars($_POST['epf_no']);
$socso_no = htmlspecialchars($_POST['socso_no']);
$lhdn_no = htmlspecialchars($_POST['lhdn_no']);
$emp_code = htmlspecialchars($_POST['emp_code']);

$sql = "UPDATE employees SET f_identity='$identity', f_race='$race', f_religion='$religion', f_marital='$marital', f_spouse='$spouse', f_children='$children', f_modified_date='$now' WHERE f_emp_id='$emp_code'";
$result = mysqli_query($conn, $sql);

$sql2 = "UPDATE bank_slip SET f_epf='$epf_no', f_socso='$socso_no', f_tax='$lhdn_no', f_modified_date='$now' WHERE f_emp_id='$emp_code'";
$result2 = mysqli_query($conn, $sql2);

if ($result && $result2) {
    echo '1';
} else {
    echo '0';
}

$dbh = null;

?>
