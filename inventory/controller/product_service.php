<?php 
    include 'global_function.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $action =  isset($_POST['action']) ? $_POST['action'] : null;

        if($action == 'create')
        {
            $comp_id = $_SESSION['company'];

            $sql = "INSERT INTO project_pillar(project_pillar,project_code,project_detail,f_id_com,created_at,updated_at) 
            VALUES ('$_POST[project_pillar]','$_POST[project_code]','$_POST[project_detail]',$comp_id,current_timestamp(),current_timestamp())";

            postAction('Product Service',$action,$sql,"Location:../resource/product_service/index.php");

        }
        elseif($action == 'update')
        {
            $sql = "UPDATE project_pillar SET project_pillar='$_POST[project_pillar]',project_detail='$_POST[project_detail]',project_code='$_POST[project_code]',updated_at=current_timestamp() WHERE BIL='$_POST[id]'";

            postAction('Product Service',$action,$sql,"Location:../resource/product_service/index.php");
        }
        elseif($action == 'delete')
        {
            $sql = "UPDATE project_pillar SET status='2' where BIL='$_POST[id]'";

            postActionAjax('Product Service',$sql);

            echo json_encode(['url' => '../product_service/index.php' , 'status'=>'success']);
        }
       
        
    }
    else
    {
        $id =  isset($_GET['id']) ? $_GET['id'] : null;

        $action =  isset($_GET['action']) ? $_GET['action'] : null;


        if($id){
            $sql = "SELECT * FROM project_pillar WHERE BIL=".$id;

            $result = mysqli_query($conn, $sql);

        }
        elseif($action == 'list')
        {
            $comp_id = $_SESSION['company'];

            $sql = "SELECT * FROM project_pillar where status = '1'
                    AND f_id_com = $comp_id
                    ORDER BY updated_at desc";

            $result = mysqli_query($conn, $sql);
            // $num_rows = mysqli_num_rows($result);

            $x = 0;

            while ($row = mysqli_fetch_array($result)) {
                $x += 1;
                $id = $row['BIL'];
                $project_name = $row['project_pillar'];
                $project_code = $row['project_code'];
                $date_update = isset($row['updated_at']) ? date('d-m-Y H:i',strtotime($row['updated_at'])) : null ;

                echo '
                <tr>
                    <td>'.$x.'</td>
                    <td>
                           '.$project_name .'
                    </td>
                    <td>' .$project_code. '</td>
                    <td>' .$date_update.'</td>

                    <td class="text-center">

                        <a class="btn btn-sm btn-warning" href="edit.php?id='.$id.'">Edit</a>

                        <button class="btn btn-sm btn-danger project_pillar_delete" value="'.$id.'">Delete</button>

                    </td>
                </tr>
                ';


               


            }
        }
    }


    





?>