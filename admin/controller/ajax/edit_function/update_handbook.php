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

$memo_id = htmlspecialchars($_POST['edit_hand_id']);
$title_name = htmlspecialchars($_POST['edit_title']);

if(isset($_FILES['edit_hand_file']['name'])){

    /* Getting file name */
    $filename = $_FILES['edit_hand_file']['name'];
    // $filename = 'passport_'.$emp_code.'_'.$year.'.pdf';
 
    /* Location */
    $location = "../../../employees/".$filename;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);
 
    /* Valid extensions */
    $valid_extensions = array("jpg","jpeg","png","pdf");
 
    $status = 0;
    /* Check file extension */
    if(in_array(strtolower($imageFileType), $valid_extensions)) {
       /* Upload file */
       if(move_uploaded_file($_FILES['edit_hand_file']['tmp_name'],$location)){
            $status = 1;
       }
    }

    // echo $status;

    if($status == 1){
        // echo 'ok';
        // $sql = "INSERT INTO memo (f_emp_id, f_title, f_description, f_uploaded_file, f_created_date, f_modified_date) VALUES ('$emp_id', '$title_name', '$memo_desc', '$filename', '$now', '$now')";
        $sql = "UPDATE handbook SET f_title='$title_name', f_uploaded_file='$filename', f_modified_date='$now' WHERE f_id='$memo_id'";
        $result = mysqli_query($conn, $sql); 
        // echo $sql;
        // echo $sql2;

        if($result){
            echo 'ok';
        }else{
            echo 'not ok1';
        }
    }else{
        // $response = 0;
        echo 'not ok2';
    }

    // echo $response;

}else{
    // $sql = "INSERT INTO memo (f_emp_id, f_title, f_description, f_uploaded_file, f_created_date, f_modified_date) VALUES ('$emp_id', '$title_name', '$memo_desc', 'No', '$now', '$now')";
    $sql = "UPDATE handbook SET f_title='$title_name', f_modified_date='$now' WHERE f_id='$memo_id'";
    $result = mysqli_query($conn, $sql); 

    if($result){
        echo 'ok';
    }else{
        echo 'not ok3';
    }
}

$dbh = null;

// }

?>