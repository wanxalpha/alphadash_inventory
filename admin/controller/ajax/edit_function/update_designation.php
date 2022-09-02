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

$desc_name = trim($_POST["desc_name"]);
$department_listing = trim($_POST["department_listing"]);
$desc_code = trim($_POST["desc_code"]);
$desc_id = trim($_POST["desc_id"]);

$sql = "UPDATE designations SET f_position = '$desc_name', f_department = '$department_listing', f_post_code = '$desc_code', f_modified_date = '$now' WHERE f_id = '$desc_id'";
$result = mysqli_query($conn, $sql);

if($result){
    echo '
    <script>
        alert("Details updated");
        window.location.href="../../../employee/designation.php"
    </script>
    
    ';
}else{
    echo '
    <script>
        alert("Update failed");
        window.location.href="../../../employee/designation.php"
    </script>
    
    ';
}

// echo $response;
    

$dbh = null;

// }

?>