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

$profile_pic = $_FILES['picture_image']['name'];
if($profile_pic != ""){
    $profile_pic = strtotime($now);
	$final_file = str_replace(' ', '-', $profile_pic);
	$profile_name = $final_file . '.jpg';

    $location = "../../../upload/profile/".$profile_name;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);

    $valid_extensions = array("jpg","jpeg","png","pdf");
    $pic_status = 0;
    if(in_array(strtolower($imageFileType), $valid_extensions)) {
        if(move_uploaded_file($_FILES['picture_image']['tmp_name'],$location)){
                $pic_status = 1;
        }else{
            $pic_status = 0;
        }
    }
}else{
    $sql_profile = "SELECT * FROM employees WHERE f_emp_id='$emp_code'";
    $result_profile = mysqli_query($conn, $sql_profile);
    $rows_profile = mysqli_fetch_array($result_profile);
    $profile_name = $rows_profile['f_picture'];
    // $profile_name = "none";
}

$sql = "UPDATE employees SET f_picture='$profile_name' WHERE f_emp_id='$emp_code'";
$result = mysqli_query($conn, $sql);