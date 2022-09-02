<?php 
    include 'global_function.php';

   

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $action ="update";

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
        $location = "../../admin/assets/img/avatars/".$filename;
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

        postAction('Company Profile',$action,$sql,"Location:../resource/dashboard/setting.php");

    }
    else
    {
        $emp_id =  $_SESSION['emp_id'];


        $sql = "SELECT f_company_id
                FROM employees
                WHERE f_id=$emp_id";

        $result = mysqli_query($conn, $sql);

    }
?>



