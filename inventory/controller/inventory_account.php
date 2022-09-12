<?php 
    include 'global_function.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $action =  isset($_POST['action']) ? $_POST['action'] : null;

        $sql_department = "SELECT f_id FROM departments WHERE f_code='IV'";
        $result_department = mysqli_query($conn, $sql_department);
        $deparment_id = null;
        $role = 'User';
        $check_employee = null;

        while ($row = mysqli_fetch_array($result_department)) {
            $deparment_id = $row['f_id'];
        }

        if($action == 'create')
        {
            $check_employee = checkEmployeeID($_POST['f_emp_id']);
            $comp_id = $_SESSION['company'];
            $f_emp_status = 1;

            if(!$check_employee)
            {
                $sql = "INSERT into employees (f_first_name,f_last_name,f_com_email,f_department,f_designation,f_password,f_user_level,f_emp_id,f_company_id,f_contact,f_emp_status,f_created_date,f_modified_date) 
                values ('$_POST[f_first_name]','$_POST[f_last_name]','$_POST[f_com_email]','$deparment_id','$_POST[category_id]','$_POST[f_password]','$_POST[f_user_level]','$_POST[f_emp_id]','$comp_id','$_POST[f_contact]','$f_emp_status',current_timestamp(),current_timestamp())";
            }
        }
        elseif($action == 'update')
        {
            $check_employee = checkEmployeeID($_POST['f_emp_id'],$_POST['id']);

            $sql = "UPDATE employees SET f_first_name='$_POST[f_first_name]',f_last_name='$_POST[f_last_name]',f_com_email='$_POST[f_com_email]',f_password='$_POST[f_password]',f_identity='$_POST[f_identity]',f_emp_id='$_POST[f_emp_id]',f_contact='$_POST[f_contact]',f_user_level='$_POST[f_user_level]',f_designation='$_POST[category_id]',f_modified_date=current_timestamp() WHERE f_id='$_POST[id]'";
        }
        elseif($action == 'delete')
        {
            $sql = "UPDATE employees SET f_delete='Y' where f_id='$_POST[id]'";

            postActionAjax('Sales Account',$sql);

            echo json_encode(['url' => '../inventory_account/index.php' , 'status'=>'success']);
        }
        elseif($action == 'upload_excel'){

            $filename = $_FILES["upload_excel"]["tmp_name"];  

            if($_FILES["upload_excel"]["size"] > 0)
            {
                $file = fopen($filename, "r");
                $flag = true;
                $f_emp_status = 1;
                $comp_id = $_SESSION['company'];



                while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
                {
                    if($flag) { $flag = false; continue; }

                    $check_employee = checkEmployeeID($getData[5]);

                    if(!$check_employee){
                        $sql = "INSERT into employees (f_first_name,f_last_name,f_com_email,f_email,f_contact,f_identity,f_department,f_password,f_user_level,f_emp_id,f_emp_status,f_company_id,f_created_date,f_modified_date) 
                        values ('".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$deparment_id."','".$getData[6]."','".$role."','".$getData[7]."','".$f_emp_status."','".$comp_id."',current_timestamp(),current_timestamp())";


                        $result = mysqli_query($conn, $sql);
                    }


                   
                }
                fclose($file);  
            }


            $sql = null;
        }

        if($check_employee){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        elseif($action != 'delete')
        {
            postAction('Stakeholder',$action,$sql,"Location:../resource/inventory_account/index.php");

        }
    }
    else
    {
        $id =  isset($_GET['id']) ? $_GET['id'] : null;

        $action =  isset($_GET['action']) ? $_GET['action'] : null;


        if($id){
            $sql = "SELECT f_id,f_first_name,f_last_name,f_com_email,f_identity,f_password,f_emp_id,f_contact,f_email,f_user_level,f_designation FROM employees WHERE f_id=".$id;

            $result = mysqli_query($conn, $sql);
        }
        elseif($action == 'list')
        {
            $comp_id = $_SESSION['company'];

            $sql = "SELECT employees.f_first_name,employees.f_last_name,c.name as category_name,employees.f_modified_date,employees.f_com_email,employees.f_id,employees.f_emp_id,
                    employees.f_contact,employees.f_email
                    FROM employees 
                    INNER JOIN departments ON employees.f_department = departments.f_id
                    LEFT JOIN inv_stakeholder_category as c ON employees.f_designation = c.id
                    where departments.f_code = 'IV' AND employees.f_company_id=".$comp_id."
                    AND employees.f_delete ='N'
                    ORDER BY employees.f_modified_date desc";

            $result = mysqli_query($conn, $sql);
            // $num_rows = mysqli_num_rows($result);

            $x = 0;

            while ($row = mysqli_fetch_array($result)) {
                $x += 1;
                $id = $row['f_id'];
                $name = $row['f_first_name'] .' '. $row['f_last_name'];
                $created_at = date('d-m-Y H:i',strtotime($row['f_modified_date']));
                $email = $row['f_com_email'] ;
                $category_name = $row['category_name'];

                echo '
                <tr>
                    <td>' .$x. '</td>
                    <td>' .$name . '</td>
                    <td>' .$email. '</td>
                    <td>' .$category_name. '</td>
                    <td>' .$created_at.'</td>

                    <td style="text-align:center">
                        <a class="btn btn-sm btn-warning" href="edit.php?id='.$id.'">Edit</a>
                        <button class="btn btn-sm btn-danger inventory_account_delete" value="'.$id.'">Delete</button>
                    </td>
                </tr>
                ';
            }
        }
        elseif($action == 'download_excel'){
            header('Content-Type: text/csv; charset=utf-8');  
            header('Content-Disposition: attachment; filename=salesperson.csv');  
            $output = fopen("php://output", "w");  

            fputcsv($output, array('No', 'First Name','Last Name', 'Company Email', 'Email Personal','Phone Number','Ic Number','Employee Id'));  

            fclose($output);  
        }
       
    }


    function checkEmployeeID($employee_id,$id = null){
        global $conn;

        if($id){
            $sql_check_employee = "SELECT * FROM employees  WHERE f_emp_id = '$employee_id' AND f_id != '$id'";
        }
        else{
            $sql_check_employee = "SELECT * FROM employees  WHERE f_emp_id = '$employee_id'";
        }

        $result = mysqli_query($conn, $sql_check_employee);

        if(mysqli_num_rows($result) > 0){
            $_SESSION["session_toast_message"] = 'Failed - Employee Id Exists';
            $_SESSION["session_toast_type"] =  'error';

            return true;
        }
        else{
            return false;

        }
    }

    





?>