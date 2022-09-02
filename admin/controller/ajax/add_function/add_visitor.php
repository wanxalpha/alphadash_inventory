<?php
//insert.php;
include_once '../../../include/config.php';

mysqli_set_charset($conn, "utf8");

date_default_timezone_set("Asia/Kuala_Lumpur");
$t = time();
$now = date("Y-m-d H:i:s", $t);
$curdate = date("Y-m-d", $t);
$year = date("Y", $t);
$hour = date("H", $t);
$minute = date("i", $t);

$v_name = htmlspecialchars($_POST["v_name"]);
$c_name = htmlspecialchars($_POST["c_name"]);
$v_phone = htmlspecialchars($_POST["v_phone"]);
$v_email = htmlspecialchars($_POST["v_email"]);
$v_purpose = htmlspecialchars($_POST["v_purpose"]);
$v_date = htmlspecialchars($_POST["v_date"]);

$sql = "INSERT INTO visitor(f_visitor_name, f_comp_name, f_phone_no, f_email, f_purpose, f_date, f_created_date, f_modified_date) VALUES ('$v_name', '$c_name', '$v_phone', '$v_email', '$v_purpose', '$v_date', '$now', '$now')";
$result = mysqli_query($conn, $sql); 

if($result){
    // $response = json_encode(array('success'=>'1','emp_id'=>$emp_id));
    echo '
    <script>
    alert("Upload Visitor Success");
    window.location.href="../../../employee/visitor.php";
    </script>
    
    ';
}else{
    // $response = json_encode(array('success'=>'0','emp_id'=>'0'));
    echo '
    <script>
    alert("Upload Visitor Success");
    window.location.href="../../../employee/visitor.php";
    </script>
    
    ';
}

// echo $response;    

$dbh = null;

?>