<?php

include_once '../../../includes/config.php';

$date1 = trim($_GET["date1"]);
$date2 = trim($_GET["date2"]);

if (strlen($date1) > 0 && strlen($date2) > 0) {

    $sql = "SELECT SUM(f_total_holiday) AS total FROM holidays WHERE f_start_date BETWEEN '$date1' AND '$date2' AND f_duplicate='N'";
    // echo $sql; exit;
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

    if($num_rows > 0){
        while($rows = mysqli_fetch_array($result)){
            $total_holiday = $rows['total'];
        }
    }

    $sql2 = "SELECT SUM(f_total_holiday) AS total FROM holidays WHERE f_replacement_date BETWEEN '$date1' AND '$date2'";
    // echo $sql2; exit;
    $result2 = mysqli_query($conn, $sql2);
    $num_rows2 = mysqli_num_rows($result2);

    if($num_rows2 > 0){
        while($rows2 = mysqli_fetch_array($result2)){
            $total_holiday2 = $rows2['total'];
        }
    }

    $final_holday = $total_holiday+$total_holiday2;

    echo json_encode($final_holday);


}

$dbh = null;

?>