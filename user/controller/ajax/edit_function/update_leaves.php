<?php

include_once '../../../include/config.php';

mysqli_set_charset($conn, "utf8");

date_default_timezone_set("Asia/Kuala_Lumpur");
$t = time();
$now = date("Y-m-d H:i:s", $t);
$curdate = date("Y-m-d", $t);
$year = date("Y", $t);
$hour = date("H", $t);
$minute = date("i", $t);

$leave = htmlspecialchars($_POST['edit_leave_id']);
$leave_reason = htmlspecialchars($_POST['edit_reason']);

if(isset($_FILES['update_leave_image']['name'])){

    /* Getting file name */
    $filename = $_FILES['update_leave_image']['name'];
    // $filename = 'passport_'.$emp_code.'_'.$year.'.pdf';
 
    /* Location */
    $location = "../../../../admin/upload/".$filename;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);
 
    /* Valid extensions */
    $valid_extensions = array("jpg","jpeg","png","pdf");
 
    $status = 0;
    /* Check file extension */
    if(in_array(strtolower($imageFileType), $valid_extensions)) {
       /* Upload file */
       if(move_uploaded_file($_FILES['update_leave_image']['tmp_name'],$location)){
            $status = 1;
       }
    }

    // echo $status;

    if($status == 1){
        // echo 'ok';
        $sql = "UPDATE leaves SET f_reason='$leave_reason', f_image='$filename', f_modified_date='$now' WHERE f_id='$leave'";
        $result = mysqli_query($conn, $sql); 
        // echo $sql;
        // echo $sql2;

        if($result){
            echo '
            <script>
                alert("Update Success");
                window.location.href="../../../employee/leaves.php"
            </script>
            
            ';
        }else{
            echo '
            <script>
                alert("Update failed");
                window.location.href="../../../employee/leaves.php"
            </script>
            
            ';
        }
    }else{
        // $response = 0;
        echo '
        <script>
            alert("Update failed2");
            window.location.href="../../../employee/leaves.php"
        </script>
        
        ';
    }

    // echo $response;

}else{

    $sql = "UPDATE leaves SET f_reason='$leave_reason', f_modified_date='$now' WHERE f_id='$leave'";
    $result = mysqli_query($conn, $sql); 

    if($result){
        echo '
        <script>
            alert("Update Success");
            window.location.href="../../../employee/leaves.php"
        </script>
        
        ';
    }else{
        echo '
        <script>
            alert("Update failed3");
            window.location.href="../../../employee/leaves.php"
        </script>
        
        ';
    }
}

$dbh = null;

?>