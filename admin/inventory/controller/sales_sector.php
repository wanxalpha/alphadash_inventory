<?php 
    include 'global_function.php';
    include_once('Lookup/ProjectSector.php');
    include_once('Lookup/SoftDelete.php');


    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $action =  isset($_POST['action']) ? $_POST['action'] : null;

        if($action == 'create')
        {
            $status = SoftDelete::CREATED;
            $comp_id = $_SESSION['company'];

            $sql = "INSERT INTO project_sector(Category,Name,Details,CompanyId,status,created_at,updated_at) 
            VALUES ('$_POST[Category]','$_POST[Name]','$_POST[Details]',$comp_id,$status,current_timestamp(),current_timestamp())";

            postAction('Product Sector',$action,$sql,"Location:../resource/sales_sector/index.php");

        }
        elseif($action == 'update')
        {
            $sql = "UPDATE project_sector SET Category='$_POST[Category]',Name='$_POST[Name]',Details='$_POST[Details]',updated_at=current_timestamp() WHERE id='$_POST[id]'";

            postAction('Product Sector',$action,$sql,"Location:../resource/sales_sector/index.php");
        }
        elseif($action == 'delete')
        {
            $sql = "UPDATE project_sector SET status='2' where id='$_POST[id]'";

            postActionAjax('Product Sector',$sql);

            echo json_encode(['url' => '../sales_sector/index.php' , 'status'=>'success']);
        }
       
        
    }
    else
    {
        $id =  isset($_GET['id']) ? $_GET['id'] : null;

        $action =  isset($_GET['action']) ? $_GET['action'] : null;


        if($id){
            $sql = "SELECT * FROM project_sector WHERE id=".$id;

            $result = mysqli_query($conn, $sql);

        }
        elseif($action == 'list')
        {
            $comp_id = $_SESSION['company'];
            $status = SoftDelete::CREATED;

            $query = 'where project_sector.status = '.$status.' AND project_sector.CompanyId = '.$comp_id;


            if(isset($_GET['category'])){
                $query = $query. ' AND Category='.$_GET['category'];
            }


            $sql = "SELECT project_sector.id,project_category.Name as category,project_sector.Name,project_sector.updated_at FROM project_sector  
                    LEFT JOIN project_category ON project_sector.Category = project_category.id
                    $query
                    ORDER BY updated_at desc";
            $result = mysqli_query($conn, $sql);
            echo $conn->error;
            $x = 0;

            while ($row = mysqli_fetch_array($result)) {
                $x += 1;
                $id = $row['id'];
                $category = $row['category'];
                $name = $row['Name'];
                $date_update = isset($row['updated_at']) ? date('d-m-Y H:i',strtotime($row['updated_at'])) : null ;

                echo '
                <tr>
                    <td>'.$x.'</td>
                    <td>
                           '.$category .'
                    </td>
                    <td>' .$name. '</td>
                    <td>' .$date_update.'</td>

                    <td class="text-center">

                        <a class="btn btn-sm btn-warning" href="edit.php?id='.$id.'">Edit</a>

                        <button class="btn btn-sm btn-danger product_sector_delete" value="'.$id.'">Delete</button>

                    </td>
                </tr>
                ';
            }
        }
    }
?>