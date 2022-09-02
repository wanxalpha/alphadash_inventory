<?php

include_once '../../../includes/config.php';

$memo_edit = trim($_GET["memo_edit"]);

$memo_info = array();

$sql = "SELECT * FROM memo WHERE f_delete='N' AND f_id='$memo_edit'";
$result = mysqli_query($conn, $sql);
$nums = mysqli_num_rows($result);

if($nums > 0){
    while($rows = mysqli_fetch_array($result)){

        $id = $rows['f_id'];
        $title = $rows['f_title'];
        $memo_desc = $rows['f_description'];

        $memo_info[] = array("id" => $id, "title" => $title, "memo_desc" => $memo_desc);
    }
}
echo json_encode($memo_info);

$dbh = null;

?>