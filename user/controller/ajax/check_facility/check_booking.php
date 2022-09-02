<?php

include_once '../../../include/config.php';

$date_pick = trim($_GET["date_pick"]);

// $room_info = "";

$sql = "SELECT * FROM facility WHERE f_delete='N' AND f_date='$date_pick'";
// echo $sql;
$result = mysqli_query($conn, $sql);
$nums = mysqli_num_rows($result);

if($nums > 0){
    while($rows = mysqli_fetch_array($result)){

        $room_id = $rows['f_id'];
        $emp_code = $rows['f_emp_id'];
        $book_date = $rows['f_date'];
        $start_time = $rows['f_from_time'];
        $end_time = $rows['f_to_time'];
        $facility = $rows['f_room'];
        $description = $rows['f_description'];

        $sql2 = "SELECT * FROM employees WHERE f_delete='N' AND f_emp_id='$emp_code'";
        $result2 = mysqli_query($conn, $sql2);
        $rows2 = mysqli_fetch_array($result2);
        $emp_name = $rows2['f_full_name'];

        $sql3 = "SELECT * FROM facility_room WHERE f_delete='N' AND f_id='$facility'";
        $result3 = mysqli_query($conn, $sql3);
        $rows3 = mysqli_fetch_array($result3);
        $room_name = $rows['f_room'];

        $time1 = date('h:i A ', strtotime($start_time));
        $time2 = date('h:i A ', strtotime($end_time));

        echo '
        <div style="background-color:yellow; width:100%; height:5rem; text-align:center; padding:1.2rem; border-bottom-style:solid;">
            <h4>'.$emp_name.'</h4>
            <p>'.$book_date.' '.$time1.' - '.$time2.'</p>
        </div>
        ';

        // $room_info[] = array("room_id" => $room_id, "room_name" => $room_name, "start_time" => $start_time, "end_time" => $end_time, "book_date" => $book_date, "description" => $description);
    }
}else{
    echo '
    <div style="background-color:yellow; width:100%; height:5rem; text-align:center; padding:1.2rem; border-bottom-style:solid;">
        <h4>There is no meeting today</h4>    
    </div>
    ';
}
// echo json_encode($room_info);

$dbh = null;

?>