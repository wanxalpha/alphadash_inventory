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

$title_name = htmlspecialchars($_POST['title_name']);

if(isset($_FILES['hand_file']['name'])){

    /* Getting file name */
    $filename = $_FILES['hand_file']['name'];
    // $filename = 'passport_'.$emp_code.'_'.$year.'.pdf';
 
    /* Location */
    $location = "../../../upload/handbook/".$filename;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);
 
    /* Valid extensions */
    $valid_extensions = array("jpg","jpeg","png","pdf");
 
    $status = 0;
    /* Check file extension */
    if(in_array(strtolower($imageFileType), $valid_extensions)) {
       /* Upload file */
       if(move_uploaded_file($_FILES['hand_file']['tmp_name'],$location)){
            $status = 1;
       }
    }

    // echo $status;

    if($status == 1){
        // echo 'ok';
        $sql = "INSERT INTO handbook (f_title, f_uploaded_file, f_created_date, f_modified_date) VALUES ('$title_name', '$filename', '$now', '$now')";
        $result = mysqli_query($conn, $sql); 
        // echo $sql;
        // echo $sql2;

        if($result){
            // echo 'ok';
            echo '
            <script>
            alert("Upload Handbook Success");
            window.location.href="../../../employee/handbook.php";
            </script>
            
            ';
        }else{
            echo '
            <script>
            alert("Upload handbook Failed");
            window.location.href="../../../employee/handbook.php";
            </script>
            
            ';
        }
    }else{
        // $response = 0;
        echo '
        <script>
        alert("Upload handbook Failed");
        window.location.href="../../../employee/handbook.php";
        </script>
        
        ';
    }

    // echo $response;

}else{
    $sql = "INSERT INTO handbook (f_title, f_uploaded_file, f_created_date, f_modified_date) VALUES ('$title_name', 'No', '$now', '$now')";
    $result = mysqli_query($conn, $sql); 

    if($result){
        echo '
        <script>
        alert("Upload Memo Success");
        window.location.href="../../../employee/handbook.php";
        </script>
        
        ';
    }else{
        echo '
        <script>
        alert("Upload Memo Failed");
        window.location.href="../../../employee/handbook.php";
        </script>
        
        ';
    }
}

$dbh = null;

// }

?>
