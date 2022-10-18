<?php 
    include 'global_function.php';

   

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $t = time();
        $now = date("Y-m-d H:i:s", $t);
        $company_id = htmlspecialchars($_POST['company_id']);
        $action ="update";

        if($_FILES['picture_image']['size'] != 0) {

            $curdate = date("Y-m-d", $t);
            $year = date("Y", $t);
            $hour = date("H", $t);
            $minute = date("i", $t);
        
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

            $company_name = $_POST['f_company_name'];
            $address_1 = $_POST['f_address_1'];
            $address_2 = $_POST['f_address_2'];
            $address_3 = $_POST['f_address_3'];
        
            $sql = "UPDATE company SET f_logo='$filename',f_company_name='$company_name',f_address_1='$address_1',f_address_2='$address_2',f_address_3='$address_3', f_modified_date='$now' WHERE f_id='$company_id'";
    
        }else{

            $company_name = $_POST['f_company_name'];
            $address_1 = $_POST['f_address_1'];
            $address_2 = $_POST['f_address_2'];
            $address_3 = $_POST['f_address_3'];
        
            $sql = "UPDATE company SET f_company_name='$company_name',f_address_1='$address_1',f_address_2='$address_2',f_address_3='$address_3', f_modified_date='$now' WHERE f_id='$company_id'";

        }
        postAction('Company Profile',$action,$sql,"Location:../resource/dashboard/setting.php");

    }
    else
    {
        $company =  $_SESSION['company'];


        $sql = "SELECT f_id,f_company_name,f_address_1,f_address_2,f_address_3,f_logo
                FROM company
                WHERE f_id=$company";

        $result = mysqli_query($conn, $sql);

    }
?>



