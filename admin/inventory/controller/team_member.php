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

            $sql = "INSERT INTO sales_grouping(Leader_id,Name,Details,CompanyId,status,created_at,updated_at) 
            VALUES ('$_POST[Leader_id]','$_POST[Name]','$_POST[Details]',$comp_id,$status,current_timestamp(),current_timestamp())";

            $result = $conn->query($sql);

            $lastInsert = $conn->insert_id;

            createTeamMember($lastInsert);

            postAction('Team Grouping',$action,null,"Location:../resource/team_member/index.php");
        }
        elseif($action == 'update')
        {
            $sql = "UPDATE sales_grouping SET Leader_id='$_POST[Leader_id]',Name='$_POST[Name]',Details='$_POST[Details]',updated_at=current_timestamp() WHERE id='$_POST[id]'";

            $delete_sql = "DELETE FROM sales_grouping_member WHERE sales_grouping_id='$_POST[id]'";

            $result = $conn->query($delete_sql);

            createTeamMember($_POST['id']);

            postAction('Team Grouping',$action,$sql,"Location:../resource/team_member/index.php");
        }
        elseif($action == 'delete')
        {
            $status = SoftDelete::DELETED;

            $sql = "UPDATE sales_grouping SET status='$status' where id='$_POST[id]'";

            postActionAjax('Sales Grouping',$sql);

            echo json_encode(['url' => '../team_member/index.php' , 'status'=>'success']);
        }
       
        
    }
    else
    {
        $id =  isset($_GET['id']) ? $_GET['id'] : null;

        $action =  isset($_GET['action']) ? $_GET['action'] : null;


        if($id){
            $sql = "SELECT * FROM sales_grouping WHERE id=".$id;

            $result = mysqli_query($conn, $sql);

            $sql_member = "SELECT * FROM sales_grouping_member WHERE sales_grouping_id=".$id;

            $result_member = mysqli_query($conn, $sql_member);

        }
        elseif($action == 'list')
        {
            $comp_id = $_SESSION['company'];
            $status = SoftDelete::CREATED;

            $query = 'where sales_grouping.status = '.$status.' AND sales_grouping.CompanyId = '.$comp_id;

            $sql = "SELECT sales_grouping.id,sales_grouping.Name,sales_grouping.updated_at,employees.f_first_name,employees.f_last_name FROM sales_grouping  
                    LEFT JOIN employees ON sales_grouping.Leader_id = employees.f_id

                    $query
                    ORDER BY updated_at desc";

            $result = mysqli_query($conn, $sql);
            echo $conn->error;
            $x = 0;

            while ($row = mysqli_fetch_array($result)) {
                $x += 1;
                $id = $row['id'];
                $name = $row['Name'];
                $leader_name = $row['f_first_name'] . ' ' . $row['f_last_name'];
                $date_update = isset($row['updated_at']) ? date('d-m-Y H:i',strtotime($row['updated_at'])) : null ;

                echo '
                <tr>
                    <td>'.$x.'</td>
                    <td>
                           '.$name .'
                    </td>
                    <td>' .$leader_name. '</td>
                    <td>' .$date_update.'</td>

                    <td class="text-center">

                        <a class="btn btn-sm btn-warning" href="edit.php?id='.$id.'">Edit</a>

                        <button class="btn btn-sm btn-danger team_member_delete" value="'.$id.'">Delete</button>

                    </td>
                </tr>
                ';
            }
        }
    }

    function createTeamMember($id){
        global $conn;

        foreach($_POST['team_member'] as $member){
            $sql_member = "INSERT INTO sales_grouping_member(f_id,sales_grouping_id,created_at,updated_at) 
            VALUES ('$member[f_id]','$id',current_timestamp(),current_timestamp())";

            $result = $conn->query($sql_member);

        }
    }
?>