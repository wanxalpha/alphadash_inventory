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

$quotes = $_POST["quotes"];
$user = $_POST["username"];


    $sql = "INSERT INTO quotes (f_emp_id, f_quotes, f_created_date, f_modified_date) VALUES ('$user', '$quotes', '$now', '$now')";
    $result = mysqli_query($conn, $sql); 
    // echo $sql;
    // echo $sql2;

    if($result){
        // echo 'ok';
        echo '
        <script>
        alert("Upload quotes Success");
        window.location.href="../../../employee/quotes.php";
        </script>
        
        ';
    }else{
        echo '
        <script>
        alert("Upload quotes Failed");
        window.location.href="../../../employee/quotes.php";
        </script>
        
        ';
    }

    // echo $response;
$dbh = null;

// }
