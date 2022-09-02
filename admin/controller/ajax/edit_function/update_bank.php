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

$emp_id = trim($_POST["emp_id"]);
$bank_name = trim($_POST["bank_name"]);
$bank_branch = trim($_POST["bank_branch"]);
$bank_account = trim($_POST["bank_account"]);
$salary = trim($_POST["salary"]);
$mobile = trim($_POST["mobile"]);
$parking = trim($_POST["parking"]);

$sql = "UPDATE bank_slip SET f_bank = '$bank_name', f_bank_branch = '$bank_branch', f_bank_acc = '$bank_account', f_salary = '$salary', f_modified_date = '$now' WHERE f_id = '$emp_id'";
$result = mysqli_query($conn, $sql);

$sql2 = "UPDATE employees SET f_mobile_all = '$mobile', f_park_all = '$parking', f_modified_date = '$now' WHERE f_id = '$emp_id'";
$result2 = mysqli_query($conn, $sql2);
// echo $sql; 
// echo "<br>"; 
// echo $sql2; exit;

if($result && $result2){
    // $response = json_encode(array('success'=>'1','emp_id'=>$emp_id)); 
    echo '
    <script>
        alert("Details updated");
        window.location.href="../../../employee/emp_bank_detail.php?emp_id='.$emp_id.'"
    </script>
    
    ';
}else{
    // $response = json_encode(array('success'=>'0','emp_id'=>'0'));
    echo '
    <script>
        alert("Update failed");
        window.location.href="../../../employee/emp_bank_detail.php?emp_id='.$emp_id.'"
    </script>
    
    ';
}

// echo $response;
    

$dbh = null;

// }

?>