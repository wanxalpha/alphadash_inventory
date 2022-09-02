<?php 
    include 'global_function.php';
    include_once('Lookup/SoftDelete.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $action =  isset($_POST['action']) ? $_POST['action'] : null;

        if($action == 'create')
        {
            $status = SoftDelete::CREATED;
            $comp_id = $_SESSION['company'];

            $sql = "INSERT INTO project_category (Name,Details,CompanyId,status,created_at,updated_at) 
            VALUES ('$_POST[Name]','$_POST[Details]',$comp_id,$status,current_timestamp(),current_timestamp())";

            postAction('Product Category',$action,$sql,"Location:../resource/product_category/index.php");

        }
        elseif($action == 'update')
        {
            $sql = "UPDATE project_category  SET Name='$_POST[Name]',Details='$_POST[Details]',updated_at=current_timestamp() WHERE id='$_POST[id]'";

            postAction('Product Category',$action,$sql,"Location:../resource/product_category/index.php");
        }
        elseif($action == 'delete')
        {
            $status = SoftDelete::DELETED;

            $sql = "UPDATE project_category  SET status=$status where id='$_POST[id]'";

            postActionAjax('Product Category',$sql);

            echo json_encode(['url' => '../product_category/index.php' , 'status'=>'success']);
        }
       
        
    }
    else
    {
        $id =  isset($_GET['id']) ? $_GET['id'] : null;

        $action =  isset($_GET['action']) ? $_GET['action'] : null;


        if($id){
            $sql = "SELECT * FROM project_category  WHERE id=".$id;

            $result = mysqli_query($conn, $sql);

        }
        elseif($action == 'list')
        {
            $comp_id = $_SESSION['company'];
            $status = SoftDelete::CREATED;

            $query = 'where status = '.$status.' AND CompanyId = '.$comp_id;


            $sql = "SELECT * FROM project_category   $query
                    ORDER BY updated_at desc";

            $result = mysqli_query($conn, $sql);

            $x = 0;

            while ($row = mysqli_fetch_array($result)) {
                $x += 1;
                $id = $row['id'];
                $name = $row['Name'];
                $date_update = isset($row['updated_at']) ? date('d-m-Y H:i',strtotime($row['updated_at'])) : null ;

                echo '
                <tr>
                    <td>'.$x.'</td>
                    <td>' .$name. '</td>
                    <td>' .$date_update.'</td>

                    <td class="text-center">

                        <a class="btn btn-sm btn-warning" href="edit.php?id='.$id.'">Edit</a>

                        <button class="btn btn-sm btn-danger product_category_delete" value="'.$id.'">Delete</button>

                    </td>
                </tr>
                ';
            }
        }
    }
?>