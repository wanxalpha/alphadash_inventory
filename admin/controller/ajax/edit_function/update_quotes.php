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

$quote_id = htmlspecialchars($_POST['edit_quote_id']);
$quotes = htmlspecialchars($_POST['edit_quote']);

if(isset($_FILES['edit_proposal']['name'])){

    /* Getting file name */
    $filename = $_FILES['edit_proposal']['name'];
 
    /* Location */
    $location = "../../../upload/proposal/".$filename;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);
 
    /* Valid extensions */
    $valid_extensions = array("jpg","jpeg","png","pdf");
 
    $status = 0;
    /* Check file extension */
    if(in_array(strtolower($imageFileType), $valid_extensions)) {
       /* Upload file */
       if(move_uploaded_file($_FILES['edit_proposal']['tmp_name'],$location)){
            $status = 1;
       }
    }

    // echo $status;

    if($status == 1){
        $sql = "UPDATE quotes SET f_quotes='$quotes', f_proposal='$filename', f_modified_date='$now' WHERE f_id='$quote_id'";
        // echo $sql; exit;
        $result = mysqli_query($conn, $sql); 
 
        if($result){
            // echo 'ok';
            echo '
        <script>
        alert("Upload quotes Success");
        window.location.href="../../../employee/quotes.php";
        </script>
        
        ';
        }else{
            // echo 'not ok1';
            echo '
        <script>
        alert("Upload quotes Failed");
        window.location.href="../../../employee/quotes.php";
        </script>
        
        ';
        }
    }else{
        // echo 'not ok2';
        echo '
        <script>
        alert("Upload quotes Failed");
        window.location.href="../../../employee/quotes.php";
        </script>
        
        ';
    }

}else{
    $sql = "UPDATE quotes SET f_quotes='$quotes', f_proposal='No', f_modified_date='$now' WHERE f_id='$quote_id'";
    // echo $sql; exit;
    $result = mysqli_query($conn, $sql); 

    if($result){
        // echo 'ok';
        echo '
        <script>
        alert("Upload quotes Success");
        window.location.href="../../../employee/quotes.php";
        </script>
        
        ';
    }else{
        // echo 'not ok3';
        echo '
        <script>
        alert("Upload quotes Failed");
        window.location.href="../../../employee/quotes.php";
        </script>
        
        ';
    }
}

$dbh = null;

// }

?>