<?php 
    include 'global_function.php';
    include_once('Lookup/FunnelStatus.php');
    include_once('Lookup/Pillar.php');
    include_once('Lookup/ProjectSector.php');


    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $action =  isset($_POST['action']) ? $_POST['action'] : null;

        $project_pillar = isset($_POST['project_pillar'] ) ? json_encode($_POST['project_pillar'])  : json_encode([]);

        $project_code = implode("",$_POST['project_pillar']);

        if($action == 'create')
        {
            $sql_project = "SELECT project_code FROM sales_funnel ORDER BY created_at desc";
            $result = mysqli_query($conn, $sql_project);
            $row   = $result->fetch_assoc();
            $comp_id = $_SESSION['company'];


            if($row)
            {
                $old_project_code = $row['project_code'];

                $last_num = substr($old_project_code, strpos($old_project_code, "-") + 1);

                $cur_num =  $last_num + 1;
            }
            else 
            {
                $cur_num = "1";
            }
    
            $running_no = str_pad($cur_num, 4, '0', STR_PAD_LEFT);

            $project_code = $project_code.'-'.$running_no;
            

            $sql = "INSERT INTO sales_funnel(project_receive_date,project_dateline,status,employee_id,project_name,actions,chance,value,company_name,customer_name,customer_contact,company_address,customer_email,
            project_po_date,project_detail,project_pillar,customer_position,discount,project_code,f_id_com,causing_issue,improvement_step,why_closed,opportunity,Category,ProjectSectorId,created_at,updated_at) 
            VALUES ('$_POST[project_receive_date]','$_POST[project_dateline]','$_POST[status]','$_POST[employee_id]','$_POST[project_name]','$_POST[actions]','$_POST[chance]','$_POST[value]','$_POST[company_name]',
                    '$_POST[customer_name]','$_POST[customer_contact]','$_POST[company_address]','$_POST[customer_email]','$_POST[project_po_date]','$_POST[project_detail]','$project_pillar','$_POST[customer_position]',
                    '$_POST[discount]','$project_code','$comp_id','$_POST[causing_issue]','$_POST[improvement_step]','$_POST[why_closed]','$_POST[opportunity]','$_POST[Category]','$_POST[ProjectSectorId]',current_timestamp(),current_timestamp())";

            $result = $conn->query($sql);

            $lastInsert = $conn->insert_id;



            foreach($_FILES['document_list'] AS $k => $v){
                $i = 0;

                foreach( $v AS $v2){
                    
                    $attach_file[$i][$k] = $v2['upload_document'];

                    $i++;
                }

            }

            foreach($attach_file as $key => $data)
            {
                $fileTmpPath = $attach_file[$key]['tmp_name'];
                
                $file_type = mimeType($attach_file[$key]['type']);

                $random_name = generateRandomString();

                $path_location = 'file/'.$random_name.'.'.$file_type;

                $dest_path = '../'.$path_location;

                move_uploaded_file($fileTmpPath, $dest_path);
                $timestamp = date('Y-m-d H:i:s');

                $sql_document = "INSERT INTO sales_funnel_document (sales_funnel_id, document_path,created_at,updated_at)
                VALUES ('$lastInsert', '$path_location', '$timestamp','$timestamp')";

                $result = $conn->query($sql_document);
            }
    
            $sql = null;
        }
        elseif($action == 'update')
        {
            $sql_project = "SELECT project_code FROM sales_funnel where id='$_POST[id]'";
            $result = mysqli_query($conn, $sql_project);
            $row   = $result->fetch_assoc();

            $old_project_code = $row['project_code'];

            $last_num = substr($old_project_code, strpos($old_project_code, "-") + 1);

            $project_code = $project_code.'-'.$last_num;

            $sql = "UPDATE sales_funnel SET project_receive_date='$_POST[project_receive_date]',project_dateline='$_POST[project_dateline]',status='$_POST[status]',employee_id='$_POST[employee_id]',project_name='$_POST[project_name]',actions='$_POST[actions]',chance='$_POST[chance]',value='$_POST[value]',
            company_name='$_POST[company_name]',customer_name='$_POST[customer_name]',customer_contact='$_POST[customer_contact]',company_address = '$_POST[company_address]',customer_email = '$_POST[customer_email]',project_po_date='$_POST[project_po_date]',project_detail='$_POST[project_detail]',
            project_pillar='$project_pillar',customer_position='$_POST[customer_position]',discount='$_POST[discount]',project_code='$project_code',causing_issue='$_POST[causing_issue]',improvement_step='$_POST[improvement_step]',why_closed='$_POST[why_closed]',opportunity='$_POST[opportunity]',Category='$_POST[Category]',ProjectSectorId='$_POST[ProjectSectorId]',updated_at=current_timestamp() WHERE id='$_POST[id]'";

            if(isset($_FILES['document_list'])){
                foreach($_FILES['document_list'] AS $k => $v){
                    $i = 0;

                    foreach( $v AS $v2){
                        
                        $attach_file[$i][$k] = $v2['upload_document'];

                        $i++;
                    }

                }

                foreach($attach_file as $key => $data)
                {
                    $fileTmpPath = $attach_file[$key]['tmp_name'];
                    
                    $file_type = mimeType($attach_file[$key]['type']);

                    $random_name = generateRandomString();

                    $path_location = 'file/'.$random_name.'.'.$file_type;

                    $dest_path = '../'.$path_location;

                    move_uploaded_file($fileTmpPath, $dest_path);
                    $timestamp = date('Y-m-d H:i:s');

                    $sql_document = "INSERT INTO sales_funnel_document (sales_funnel_id, document_path,created_at,updated_at)
                    VALUES ('$_POST[id]', '$path_location', '$timestamp','$timestamp')";

                    $result = $conn->query($sql_document);
                }
            }
                

        }
       
        
        postAction('Sales Funnel',$action,$sql,"Location:../resource/sales_funnel/index.php");
    }
    else
    {
        $id =  isset($_GET['id']) ? $_GET['id'] : null;

        $action =  isset($_GET['action']) ? $_GET['action'] : null;

        $comp_id = $_SESSION['company'];

        if($id){
            $sql = "SELECT * FROM sales_funnel WHERE id=".$id;

            $sql_document = "SELECT * FROM sales_funnel_document WHERE sales_funnel_id=".$id . " ORDER BY created_at desc"; 

            $result = mysqli_query($conn, $sql);

            $result_document = mysqli_query($conn, $sql_document);
        }
        elseif($action == 'list')
        {
            $query = ' WHERE f_id_com='.$comp_id;

            if($_SESSION['role'] == 'User'){
                $query = $query.' AND employee_id='.$_SESSION['emp_id'] ;
            }
            if($_GET['status']){
                $query = $query. ' AND sales_funnel.status='.$_GET['status'];
            }

            if($_GET['year']){
                $query = $query." AND YEAR(sales_funnel.created_at) = ".$_GET['year'];
            }

            if($_GET['month']){
                $query = $query." AND MONTH(sales_funnel.created_at) = ".$_GET['month'];
            }
            if($_GET['category']){
                $query = $query." AND sales_funnel.Category = ".$_GET['category'];
            }

            $sql = "SELECT sales_funnel.id,sales_funnel.project_name,sales_funnel.project_receive_date,sales_funnel.project_dateline,sales_funnel.customer_name,
                    sales_funnel.project_code,sales_funnel.Category,sales_funnel.status,project_category.Name as category
                    ,project_sector.Name
                    FROM sales_funnel 
                    LEFT JOIN project_sector ON sales_funnel.ProjectSectorId = project_sector.id
                    LEFT JOIN project_category ON project_sector.Category = project_category.id

                    $query ORDER BY sales_funnel.updated_at desc";
            
            $result = mysqli_query($conn, $sql);
            // $num_rows = mysqli_num_rows($result);
            echo $conn->error;
            $x = 0;

            while ($row = mysqli_fetch_array($result)) {
                $x += 1;
                $id = $row['id'];
                $project_name = $row['project_name'];
                $project_receive_date = date('d-m-Y',strtotime($row['project_receive_date']));
                $project_dateline = date('d-m-Y',strtotime($row['project_dateline']));
                $pic_name = $row['customer_name'];
                $project_code = $row['project_code'];
                $category = $row['category'];
                $sector = $row['Name'];

                if($row['status'] == FunnelStatus::CLOSED || ($row['status'] == FunnelStatus::LOSS && $_SESSION['role'] == 'User'))  $button  = '<a class="btn btn-sm btn-info" href="view.php?id='.$id.'">View</a>';

                else $button  = '<a class="btn btn-sm btn-warning" href="edit.php?id='.$id.'">Edit</a>';

                if($row['status'] == FunnelStatus::CLOSED) $status = '<span class="badge bg-label-success me-1">Closed</span>' ;

                elseif($row['status'] == FunnelStatus::KIV) $status = '<span class="badge bg-label-info me-1">KIV</span>' ;

                elseif($row['status'] == FunnelStatus::POTENTIAL) $status = '<span class="badge bg-label-primary me-1">Potential</span>' ;

                else  $status = '<span class="badge bg-label-danger me-1">Loss</span>' ;



                echo '
                <tr>
                    <td>'.$x.'</td>
                    <td>' .$project_name. '</td>
                    <td>'.$category.'</td>
                    <td>'.$sector.'</td>
                    <td>' .$project_receive_date. '</td>
                    <td>' .$project_code.'</td>
                    <td>' .$status.'</td>
                    <td style="text-align:center">
                        '. $button.'
                    </td>
                </tr>
                ';
            }
        }
        elseif($action == 'dropdown-sector'){
            $sql = "SELECT * FROM project_sector WHERE Category=$_GET[Category] AND CompanyId=$comp_id ORDER BY Name asc";
            
            $result = mysqli_query($conn, $sql);

            echo '<option value="" hidden>--- Please Choose Sector ----</option>';

            while ($row = mysqli_fetch_array($result)) {

                echo '<option value="'.$row['id'].'">
                        '.$row['Name'].'
                    </option>';
            }
        }
    }

    function mimeType($file_type)
    {
        if($file_type == "application/pdf") $docformat = 'pdf';

        else if($file_type == "image/jpeg") $docformat = 'jpeg';

        else if($file_type == "image/jpg") $docformat = 'jpg';

        else if($file_type == "image/png") $docformat = 'png';

        elseif($file_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") $docformat = 'xlsx';

        elseif($file_type =='application/msword') $docformat = 'docx';

        else $docformat=null;

        return $docformat;
    }

    function generateRandomString($length = 30) {
        $date = new Datetime();
        $current_timestamp = $date->format('YmdHis');

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $randomString = $randomString.'_'.$current_timestamp;
        return $randomString;
    }

?>