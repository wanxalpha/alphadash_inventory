<?php

include_once '../../../include/config.php';

// $dep_edit = trim($_GET["dep_list"]);
$dep_list = array();

$sql = "SELECT * FROM departments";
$result = mysqli_query($conn, $sql);
$nums = mysqli_num_rows($result);
// echo $nums;
if($nums > 0){
    // $cnt=1;
    while($rows = mysqli_fetch_array($result)){
        $dep_id = $rows['f_id'];
        $dep_name = trim($rows['f_department']);

        

        $dep_list[] = array("dep_id" => $dep_id, "dep_name" => $dep_name);
        // $cnt++;
    }
    
}

echo json_encode($dep_list);
    

    // echo json_encode($data);

$dbh = null;
?>