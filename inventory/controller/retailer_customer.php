<?php 
    include 'global_function.php';
    include_once('Lookup/SoftDelete.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $action =  isset($_POST['action']) ? $_POST['action'] : null;

        if($action == 'create')
        {
            $emp_id = $_SESSION['emp_id'];
            $comp_id = $_SESSION['company'];

            $sql = "INSERT INTO inv_customer (company_id,retailer_id,name,mobile_number,phone_number,email,address,created_by,created_at) 
            VALUES ('$comp_id','$emp_id','$_POST[name]','$_POST[mobile_number]','$_POST[phone_number]','$_POST[email]','$_POST[address]',$emp_id,current_timestamp())";
            
            postAction('Customer',$action,$sql,"Location:../resource/retailer_customer/index.php");

        }
        elseif($action == 'update')
        {
            
            $sql = "UPDATE inv_customer  SET name='$_POST[name]',mobile_number='$_POST[mobile_number]', phone_number='$_POST[phone_number]',
                    email='$_POST[email]',address='$_POST[address]',updated_by=$emp_id,updated_at=current_timestamp() WHERE id='$_POST[id]'";
            
            postAction('Customer',$action,$sql,"Location:../resource/retailer_customer/index.php");
        }
        elseif($action == 'delete')
        {
            $sql = "UPDATE inv_customer  SET deleted_at=current_timestamp() where id='$_POST[id]'";

            postActionAjax('Customer',$sql);

            echo json_encode(['url' => '../retailer_customer/index.php' , 'status'=>'success']);
        }
       
        
    }
    else
    {
        $id =  isset($_GET['id']) ? $_GET['id'] : null;

        $action =  isset($_GET['action']) ? $_GET['action'] : null;


        if($id){
            $sql = "SELECT * FROM inv_customer  WHERE id=".$id;

            $result = mysqli_query($conn, $sql);

        }
        elseif($action == 'list'){
            $comp_id = $_SESSION['company'];
            $emp_id = $_SESSION['emp_id'];

            $status = SoftDelete::CREATED;

            $sql = "SELECT a.id , a.name as name, a.mobile_number, a.email,a.created_at as created_at
                    FROM inv_customer a 
                    WHERE a.deleted_at IS NULL
                    AND a.company_id = '$comp_id'
                    AND a.retailer_id = '$emp_id'
                    ORDER BY a.name desc";

            $result = mysqli_query($conn, $sql);

            $x = 0;
            
            while ($row = mysqli_fetch_array($result)) {
                
                $x += 1;
                $id = $row['id'];
                $name = $row['name'];
                $mobile_number = $row['mobile_number'];
                $email = $row['email'];
                $date_created = isset($row['created_at']) ? date('d-m-Y H:i',strtotime($row['created_at'])) : null ;

                echo '
                <tr>
                    <td>'.$x.'</td>
                    <td>' .$name. '</td>
                    <td>' .$mobile_number.'</td>
                    <td>' .$email.'</td>
                    <td>' .$date_created.'</td>

                    <td class="text-center">

                        <a class="btn btn-sm btn-warning" href="edit.php?id='.$id.'">Edit</a>

                        <button class="btn btn-sm btn-danger retailer_customer_delete" value="'.$id.'">Delete</button>

                    </td>
                </tr>
                ';
            }
        }
    }
?>