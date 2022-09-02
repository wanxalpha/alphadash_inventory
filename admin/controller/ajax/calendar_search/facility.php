<?php

include_once '../../../include/config.php';

$leave_arr = array();

$sql = "SELECT f_holiday_name AS title, f_start_day AS start_time, f_end_day AS end_time, f_holiday_name AS description, 
        CASE WHEN f_restart_date != 'none' THEN f_restart_date ELSE f_start_date END AS start_date, 
        CASE WHEN f_reend_date != 'none' THEN f_reend_date ELSE f_end_date END AS end_date
        from holidays 
        UNION (
        SELECT b.f_room, a.f_from_time, a.f_to_time, a.f_description, a.f_date, a.f_date FROM facility a 
        LEFT JOIN facility_room b ON a.f_room = b.f_id 
        WHERE a.f_delete='N'
        );";

$statement = $dbh->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();

foreach ($result as $row) {

    if($row['start_time'] == "Sunday" || $row['start_time'] == "Monday" || $row['start_time'] == "Tuesday" || $row['start_time'] == "Wednesday" || $row['start_time'] == "Thursday" || $row['start_time'] == "Friday" || $row['start_time'] == "Saturday"){
        $start = $row['start_date'];
    }else{
        $start = $row['start_date'].'T'.$row['start_time'];
    }

    if($row['end_time'] == "Sunday" || $row['end_time'] == "Monday" || $row['end_time'] == "Tuesday" || $row['end_time'] == "Wednesday" || $row['end_time'] == "Thursday" || $row['end_time'] == "Friday" || $row['end_time'] == "Saturday"){
        // $end_time = "23:59:59";
        $end = $row['end_date'];
        $color = "maroon";
    }else{
        $end = $row['end_date'].'T'.$row['end_time'];
        $color = "magenta";
    }

    // $start = $row['start_date'].'T'.$start_time;
    // $end = $row['end_date'].'T'.$end_time;

    $leave_arr[] = array(
        'title'   => $row["title"],
        'start'   => $start,
        'end'   => $end,
        'description' => $row["description"],
        'color' => $color
    );
}

echo json_encode($leave_arr, JSON_PRETTY_PRINT);


$dbh = null;
?>
