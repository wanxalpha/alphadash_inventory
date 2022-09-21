<?php 
    include 'global_function.php';
  
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $action ="update";

        if($_FILES['picture_image']['name'] != "")
        {
             $t = time();
            $now = date("Y-m-d H:i:s", $t);
            $curdate = date("Y-m-d", $t);
            $year = date("Y", $t);
            $hour = date("H", $t);
            $minute = date("i", $t);
        
            $filename = $_FILES['picture_image']['name'];

            $location = "../../admin/upload/profile/".$filename;
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
        }
        else {
            $filename = $_POST['f_picture'];
        }
        
        $sql = "UPDATE employees SET f_picture='$filename',f_first_name='$_POST[f_first_name]',f_last_name='$_POST[f_last_name]',f_com_email='$_POST[f_com_email]',f_contact='$_POST[f_contact]',f_modified_date=current_timestamp() WHERE f_id='$_POST[id]'";

        postAction('Profile',$action,$sql,"Location:../resource/dashboard/myprofile.php");

    }
    else
    {
        $id =  $_SESSION['emp_id'];


        $sql = "SELECT employees.f_id,company.f_logo,employees.f_first_name,employees.f_last_name,employees.f_emp_id,employees.f_designation,employees.f_picture,designations.f_position,f_com_email,employees.f_contact FROM employees
                LEFT JOIN designations ON employees.f_designation = designations.f_id
                LEFT JOIN company ON employees.f_company_id = company.f_id
                WHERE employees.f_id=$emp_id";

        $result = mysqli_query($conn, $sql);



    }
?>
