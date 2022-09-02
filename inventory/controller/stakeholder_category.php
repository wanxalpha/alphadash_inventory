<?php 
    include 'global_function.php';
    include_once('Lookup/SoftDelete.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $action =  isset($_POST['action']) ? $_POST['action'] : null;

        if($action == 'create')
        {
            $emp_id = $_SESSION['emp_id'];

            $sql = "INSERT INTO inv_stakeholder_category (name,remark,created_by,created_at) 
            VALUES ('$_POST[name]','$_POST[remark]',$emp_id,current_timestamp())";
            postAction('Stakeholder Category',$action,$sql,"Location:../resource/stakeholder_category/index.php");

        }
        elseif($action == 'update')
        {
            $sql = "UPDATE inv_stakeholder_category  SET name='$_POST[name]',remark='$_POST[remark]',updated_by=$emp_id,updated_at=current_timestamp() WHERE id='$_POST[id]'";

            postAction('Stakeholder Category',$action,$sql,"Location:../resource/stakeholder_category/index.php");
        }
        elseif($action == 'delete')
        {
            $sql = "UPDATE inv_stakeholder_category  SET deleted_at=current_timestamp() where id='$_POST[id]'";

            postActionAjax('Stakeholder Category',$sql);

            echo json_encode(['url' => '../stakeholder_category/index.php' , 'status'=>'success']);
        }
       
        
    }
    else
    {
        $id =  isset($_GET['id']) ? $_GET['id'] : null;

        $action =  isset($_GET['action']) ? $_GET['action'] : null;


        if($id){
            $sql = "SELECT * FROM inv_stakeholder_category  WHERE id=".$id;

            $result = mysqli_query($conn, $sql);

        }
        elseif($action == 'list')
        {
            $comp_id = $_SESSION['company'];
            $status = SoftDelete::CREATED;

            $query = 'where deleted_at IS NULL';


            $sql = "SELECT * FROM inv_stakeholder_category   $query
                    ORDER BY name desc";
            
            $result = mysqli_query($conn, $sql);

            $x = 0;

            while ($row = mysqli_fetch_array($result)) {
                $x += 1;
                $id = $row['id'];
                $name = $row['name'];
                $date_created = isset($row['created_at']) ? date('d-m-Y H:i',strtotime($row['created_at'])) : null ;

                echo '
                <tr>
                    <td>'.$x.'</td>
                    <td>' .$name. '</td>
                    <td>' .$date_created.'</td>

                    <td class="text-center">

                        <a class="btn btn-sm btn-warning" href="edit.php?id='.$id.'">Edit</a>

                        <button class="btn btn-sm btn-danger stakeholder_category_delete" value="'.$id.'">Delete</button>

                    </td>
                </tr>
                ';
            }
        }
    }
?>