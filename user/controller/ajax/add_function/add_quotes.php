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

$quotes = $_POST["quotes"];
$user = $_POST["username"];

if(isset($_FILES['proposal']['name'])){

    /* Getting file name */
    $filename = $_FILES['proposal']['name'];
    // $filename = 'passport_'.$emp_code.'_'.$year.'.pdf';
 
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
       if(move_uploaded_file($_FILES['proposal']['tmp_name'],$location)){
            $status = 1;
       }
    }

    // echo $status;

    if($status == 1){
        // echo 'ok';
        $sql = "INSERT INTO quotes (f_emp_id, f_quotes, f_proposal, f_created_date, f_modified_date) VALUES ('$user', '$quotes', '$filename', '$now', '$now')";
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
            alert("Upload quotes Failed");
            window.location.href="../../../employee/quotes.php";
            </script>
            
            ';
        }
    }else{
        // $response = 0;
        echo '
        <script>
        alert("Upload quotes Failed");
        window.location.href="../../../employee/quotes.php";
        </script>
        
        ';
    }

    // echo $response;

}else{
    $sql = "INSERT INTO quotes (f_emp_id, f_quotes, f_proposal, f_created_date, f_modified_date) VALUES ('$user', '$quotes', 'No', '$now', '$now')";
    $result = mysqli_query($conn, $sql); 

    if($result){
        echo '
        <script>
        alert("Upload quotes Success");
        window.location.href="../../../employee/quotes.php";
        </script>
        
        ';
    }else{
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
