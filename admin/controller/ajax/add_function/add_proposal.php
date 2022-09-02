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

$title = $_POST["title"];
$user = $_POST["username"];
// $propsal = $_POST["proposal"];

// echo $propsal; exit;
// print_r($_FILES['upload_proposal']);
// exit;
if(isset($_FILES['upload_proposal']['name'])){
    $filename = $_FILES['upload_proposal']['name'];

    $location = "../../../upload/proposal/".$filename;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);
 
    /* Valid extensions */
    $valid_extensions = array("jpg","jpeg","png","pdf");
 
    $status = 0;
    /* Check file extension */
    if(in_array(strtolower($imageFileType), $valid_extensions)) {
       /* Upload file */
       if(move_uploaded_file($_FILES['upload_proposal']['tmp_name'],$location)){
            $status = 1;
       }
    }

    if($status == 1){
        // echo 'ok';
        $sql = "INSERT INTO proposal (f_emp_id, f_title, f_proposal, f_created_date, f_modified_date) VALUES ('$user', '$title', '$filename', '$now', '$now')";
        $result = mysqli_query($conn, $sql); 
        // echo $sql;
        // echo $sql2;

        if($result){
            // echo 'ok';
            echo '
            <script>
            alert("Upload quotes Success");
            window.location.href="../../../employee/quotes.php";
            </script>
            
            ';
        }else{
            echo '
            <script>
            alert("Upload quotes Failed1");
            window.location.href="../../../employee/quotes.php";
            </script>
            
            ';
        }
    }else{
        // $response = 0;
        echo '
        <script>
        alert("Upload quotes Failed2");
        window.location.href="../../../employee/quotes.php";
        </script>
        
        ';
    }


}

$dbh = null;

// }

?>
