<?php

include_once '../../../include/config.php';

$leave_arr = array();

$sql = "SELECT f_holiday_name AS name, f_start_day AS le_type, f_end_day AS total, f_restart_day AS start_time, f_reend_day AS end_time,
        CASE WHEN f_restart_date != 'none' THEN f_restart_date ELSE f_start_date END AS start_date, 
        CASE WHEN f_reend_date != 'none' THEN f_reend_date ELSE f_end_date END AS end_date
        from holidays 
        UNION (
        SELECT f_full_name, f_leave_type, f_total, f_start_time, f_end_time, f_start_date, f_end_date
        FROM leaves a 
        LEFT JOIN leave_type b ON a.f_leave_type = b.f_id 
        LEFT JOIN employees c ON a.f_emp_id = c.f_emp_id 
        WHERE a.f_status='Approved')";

$statement = $dbh->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();

foreach ($result as $row) {

    if($row["total"] >= 1){
        $total = $row["end_date"];
        $line = date('Y-m-d', strtotime($total . ' +1 day'));
        $start = $row["start_date"];
    }elseif($row["total"] < 1){
        $line = $row["end_date"]."T".$row["end_time"];
        $start = $row["start_date"]."T".$row["start_time"];
    }else{
        $line = $row["end_date"];
        $start = $row["start_date"];
    }

    if($row["le_type"] == "1"){
        $color = "purple";
    }elseif($row["le_type"] == "2"){
        $color = "black";
    }elseif($row["le_type"] == "3"){
        $color = "red";
    }elseif($row["le_type"] == "4"){
        $color = "yellow";
    }elseif($row["le_type"] == "5"){
        $color = "green";
    }elseif($row["le_type"] == "6"){
        $color = "black";
    }elseif($row["le_type"] == "7"){
        $color = "green";
    }else{
        $color = "maroon";
    }

    // echo $line;
    $leave_arr[] = array(
        'title'   => $row["name"],
        'start'   => $start,
        'end'   => $line,
        'color' => $color
    );
}

echo json_encode($leave_arr, JSON_PRETTY_PRINT);
// echo $leave_arr;

$dbh = null;
?>
