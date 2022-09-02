<?php

include_once '../../../include/config.php';

$facility_edit = trim($_GET["facility_edit"]);

$room_info = array();

$sql = "SELECT * FROM facility WHERE f_delete='N' AND f_id='$facility_edit'";
$result = mysqli_query($conn, $sql);
$nums = mysqli_num_rows($result);

if($nums > 0){
    while($rows = mysqli_fetch_array($result)){

        $room_id = $rows['f_id'];
        $start_time = $rows['f_from_time'];
        $end_time = $rows['f_to_time'];
        $book_date = $rows['f_date'];
        $description = $rows['f_description'];
        $room_name = $rows['f_room'];

        $room_info[] = array("room_id" => $room_id, "room_name" => $room_name, "start_time" => $start_time, "end_time" => $end_time, "book_date" => $book_date, "description" => $description);
    }
}
echo json_encode($room_info);

$dbh = null;

?>