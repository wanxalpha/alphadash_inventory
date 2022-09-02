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

$company_id = htmlspecialchars($_POST['company_id']);
$filename = $_FILES['picture_image']['name'];
// echo $filename; exit;

/* Location */
$location = "../../../assets/img/avatars/".$filename;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);
$imageFileType = strtolower($imageFileType);

/* Valid extensions */
$valid_extensions = array("jpg","jpeg","png","pdf");

$status = 0;
/* Check file extension */
if(in_array(strtolower($imageFileType), $valid_extensions)) {
   /* Upload file */
   if(move_uploaded_file($_FILES['picture_image']['tmp_name'],$location)){
        $status = 1;
   }
}

// echo $status; exit;

$sql = "UPDATE company SET f_logo='$filename', f_modified_date='$now' WHERE f_id='$company_id'";
// echo $sql . "<br>";
$result = mysqli_query($conn, $sql);
// echo $sql2. "<br>";

if ($result) {
    echo "<script>alert('logo Has Been Updated.');</script>";
    echo "<script>window.location.href='../../../employee/emp_detail.php';</script>";
    // echo '1';
} else {
    echo "<script>alert('Something Went Wrong');</script>";
    // echo '0';
}

$dbh = null;

?>
