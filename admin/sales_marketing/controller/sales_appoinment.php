<?php 
    include 'global_function.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $action =  isset($_POST['action']) ? $_POST['action'] : null;

        if($action == 'create')
        {
            $sql = "INSERT INTO sales_appointment(employee_id,company_name,pic_name,pic_position,pic_mobile,pic_email,remark,appointment_date,created_at,updated_at) 
            VALUES ('$_POST[sales_person]','$_POST[company_name]','$_POST[pic_name]','$_POST[pic_position]','$_POST[pic_contact_number]','$_POST[pic_email]','$_POST[remarks]','$_POST[date]',current_timestamp(),current_timestamp())";
        }
        elseif($action == 'update')
        {
            $sql = "UPDATE sales_appointment SET employee_id='$_POST[sales_person]',company_name='$_POST[company_name]',pic_name='$_POST[pic_name]',pic_position='$_POST[pic_position]',pic_mobile='$_POST[pic_contact_number]',pic_email='$_POST[pic_email]',remark='$_POST[remarks]',appointment_date='$_POST[date]',updated_at=current_timestamp() WHERE id='$_POST[id]'";

        }
       
        
        postAction('Sales Appoinment',$action,$sql,"Location:../resource/sales_appoinment/index.php");
    }
    else
    {
        $id =  isset($_GET['id']) ? $_GET['id'] : null;

        $action =  isset($_GET['action']) ? $_GET['action'] : null;


        if($id){
            $sql = "SELECT * FROM sales_appointment WHERE id=".$id;

            $result = mysqli_query($conn, $sql);

        }
        elseif($action == 'list')
        {
            $comp_id = $_SESSION['company'];

            $role = $_SESSION['role'] == 'User' ? ' WHERE a.employee_id='.$_SESSION['emp_id'] : 'WHERE b.f_company_id='.$comp_id;

            $sql = "SELECT a.id , a.company_name, a.appointment_date, b.f_first_name,b.f_last_name, b.f_picture 
                    FROM sales_appointment a 
                    LEFT JOIN employees b ON a.employee_id = b.f_id
                    $role
                    ORDER BY a.updated_at desc";

            $result = mysqli_query($conn, $sql);
            // $num_rows = mysqli_num_rows($result);

            $x = 0;

            while ($row = mysqli_fetch_array($result)) {
                $x += 1;
                $id = $row['id'];
                $company_name = $row['company_name'];
                $appointment_date = date('d-m-Y H:i',strtotime($row['appointment_date']));
                $f_first_name = $row['f_first_name'] . ' ' . $row['f_last_name'];
                $f_picture = $row['f_picture'];

                echo '
                <tr>
                    <td>'.$x.'</td>
                    <td>
                           '.$f_first_name .'
                    </td>
                    <td>' .$company_name. '</td>
                    <td>' .$appointment_date.'</td>

                    <td style="text-align:center">
                        <a class="btn btn-sm btn-warning" href="edit.php?id='.$id.'">Edit</a>
                    </td>
                </tr>
                ';


               


            }
        }
    }


    





?>