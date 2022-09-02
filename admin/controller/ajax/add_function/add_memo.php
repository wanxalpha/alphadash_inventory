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

$emp_id = htmlspecialchars($_POST['emp_id']);
$title_name = htmlspecialchars($_POST['title_name']);
$memo_desc = htmlspecialchars($_POST['memo_description']); 

if(isset($_FILES['memo_file']['name'])){

    /* Getting file name */
    $filename = $_FILES['memo_file']['name'];
    // $filename = 'passport_'.$emp_code.'_'.$year.'.pdf';
 
    /* Location */
    $location = "../../../upload/memo/".$filename;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);
 
    /* Valid extensions */
    $valid_extensions = array("jpg","jpeg","png","pdf");
 
    $status = 0;
    /* Check file extension */
    if(in_array(strtolower($imageFileType), $valid_extensions)) {
       /* Upload file */
       if(move_uploaded_file($_FILES['memo_file']['tmp_name'],$location)){
            $status = 1;
       }
    }

    // echo $status;

    if($status == 1){
        // echo 'ok';
        $sql = "INSERT INTO memo (f_emp_id, f_title, f_description, f_uploaded_file, f_created_date, f_modified_date) VALUES ('$emp_id', '$title_name', '$memo_desc', '$filename', '$now', '$now')";
        $result = mysqli_query($conn, $sql); 
        // echo $sql;
        // echo $sql2;

        if($result){
            // echo 'ok';
            echo '
            <script>
            alert("Upload Memo Success");
            window.location.href="../../../employee/memo.php";
            </script>
            
            ';
        }else{
            echo '
            <script>
            alert("Upload Memo Failed1");
            window.location.href="../../../employee/memo.php";
            </script>
            
            ';
        }
    }else{
        // $response = 0;
        echo '
        <script>
        alert("Upload Memo Failed2");
        window.location.href="../../../employee/memo.php";
        </script>
        
        ';
    }

    // echo $response;

}else{
    $sql = "INSERT INTO memo (f_emp_id, f_title, f_description, f_uploaded_file, f_created_date, f_modified_date) VALUES ('$emp_id', '$title_name', '$memo_desc', 'No', '$now', '$now')";
    echo $sql; exit;
    $result = mysqli_query($conn, $sql); 

    if($result){
        echo '
        <script>
        alert("Upload Memo Success");
        window.location.href="../../../employee/memo.php";
        </script>
        
        ';
    }else{
        echo '
        <script>
        alert("Upload Memo Failed3");
        window.location.href="../../../employee/memo.php";
        </script>
        
        ';
    }
}

$dbh = null;

// }

?>
