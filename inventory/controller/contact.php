<?php 
    include 'global_function.php';
    include_once('Lookup/SoftDelete.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $action =  isset($_POST['action']) ? $_POST['action'] : null;

        if($action == 'create')
        {
            $emp_id = $_SESSION['emp_id'];

            $sql = "INSERT INTO inv_contact (category_id,name,company_name,mobile_number,phone_number,email,tax_number,address,created_by,created_at) 
            VALUES ('$_POST[category_id]','$_POST[name]','$_POST[company_name]','$_POST[mobile_number]','$_POST[phone_number]','$_POST[email]','$_POST[tax_number]','$_POST[address]',$emp_id,current_timestamp())";
            
            postAction('Stakeholder',$action,$sql,"Location:../resource/contact/index.php");

        }
        elseif($action == 'update')
        {
            
            $sql = "UPDATE inv_contact  SET category_id='$_POST[category_id]',name='$_POST[name]',company_name='$_POST[company_name]',mobile_number='$_POST[mobile_number]',
            phone_number='$_POST[phone_number]',email='$_POST[email]',tax_number='$_POST[tax_number]',address='$_POST[address]',updated_by=$emp_id,updated_at=current_timestamp() WHERE id='$_POST[id]'";
            // echo($sql);exit();
            postAction('Stakeholder',$action,$sql,"Location:../resource/contact/index.php");
        }
        elseif($action == 'delete')
        {
            $sql = "UPDATE inv_contact  SET deleted_at=current_timestamp() where id='$_POST[id]'";

            postActionAjax('Stakeholder',$sql);

            echo json_encode(['url' => '../contact/index.php' , 'status'=>'success']);
        }
       
        
    }
    else
    {
        $id =  isset($_GET['id']) ? $_GET['id'] : null;

        $action =  isset($_GET['action']) ? $_GET['action'] : null;


        if($id){
            $sql = "SELECT * FROM inv_contact  WHERE id=".$id;

            $result = mysqli_query($conn, $sql);

        }
        elseif($action == 'list'){
            $comp_id = $_SESSION['company'];
            $status = SoftDelete::CREATED;

            $sql = "SELECT a.id , a.name as name, a.company_name as company_name, b.name as category_name, a.created_at as created_at, b.name as category_name 
                    FROM inv_contact a 
                    LEFT JOIN inv_stakeholder_category b ON a.category_id = b.id 
                    where a.deleted_at IS NULL
                    ORDER BY a.name desc";

            $result = mysqli_query($conn, $sql);

            $x = 0;
            
            while ($row = mysqli_fetch_array($result)) {
                
                $x += 1;
                $id = $row['id'];
                $name = $row['name'];
                $company_name = $row['company_name'];
                $category_name = $row['category_name'];
                $date_created = isset($row['created_at']) ? date('d-m-Y H:i',strtotime($row['created_at'])) : null ;

                echo '
                <tr>
                    <td>'.$x.'</td>
                    <td>' .$name. '</td>
                    <td>' .$company_name.'</td>
                    <td>' .$category_name.'</td>
                    <td>' .$date_created.'</td>

                    <td class="text-center">

                        <a class="btn btn-sm btn-warning" href="edit.php?id='.$id.'">Edit</a>

                        <button class="btn btn-sm btn-danger contact_delete" value="'.$id.'">Delete</button>

                    </td>
                </tr>
                ';
            }
        }
    }
?>