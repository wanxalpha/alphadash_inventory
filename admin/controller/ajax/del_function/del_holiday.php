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

$holiday_id = trim($_POST["del_holiday_id"]);

$sql = "UPDATE holidays SET f_delete = 'Y', f_modified_date = '$now' WHERE f_id = '$holiday_id'";
$result = mysqli_query($conn, $sql);

if($result){
    echo '
    <script>
        alert("Details deleted");
        window.location.href="../../../employee/holidays.php"
    </script>
    
    ';
}else{
    echo '
    <script>
        alert("Delete failed");
        window.location.href="../../../employee/holidays.php"
    </script>
    
    ';
}

// echo $response;
    

$dbh = null;

// }

?>