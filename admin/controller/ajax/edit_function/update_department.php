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

$dep_name = trim($_POST["edit_dep_name"]);
$dep_id = trim($_POST["edit_dep_id"]);

$sql = "UPDATE departments SET f_department = '$dep_name', f_modified_date = '$now' WHERE f_id = '$dep_id'";
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