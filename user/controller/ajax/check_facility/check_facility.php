<?php

include_once '../../../include/config.php';

$facility_edit = trim($_GET["facility_edit"]);

$room_type = array();

$sql = "SELECT * FROM facility_room WHERE f_delete='N' AND f_id='$facility_edit'";
$result = mysqli_query($conn, $sql);
$nums = mysqli_num_rows($result);

if($nums > 0){
    while($rows = mysqli_fetch_array($result)){

        $room_id = $rows['f_id'];
        $room_name = $rows['f_room'];

        $room_type[] = array("id" => $room_id, "name" => $room_name);
    }
}
echo json_encode($room_type);

$dbh = null;

?>