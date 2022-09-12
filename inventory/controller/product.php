<?php 
    include 'global_function.php';
    include_once('Lookup/SoftDelete.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $action =  isset($_POST['action']) ? $_POST['action'] : null;

        if($action == 'create')
        {
            $comp_id = $_SESSION['company'];

            $sql = "INSERT INTO inv_product ('company_id,name,product_category_id,product_code,sales_price,buy_price,low_quantity_alert,description,created_by,created_at) 
            VALUES ('$comp_id','$_POST[name]','$_POST[product_category_id]','$_POST[product_code]','$_POST[sales_price]','$_POST[buy_price]','$_POST[low_quantity_alert]','$_POST[description]',$emp_id,current_timestamp())";

            $result = $conn->query($sql);

            $lastInsert = $conn->insert_id;

            if(isset($_FILES['document_list'])){
                foreach($_FILES['document_list'] AS $k => $v){
                    $i = 0;

                    foreach( $v AS $v2){
                        
                        $attach_file[$i][$k] = $v2['attachment'];

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

                    $sql_document = "INSERT INTO inv_product_attachment (product_id, attachment_path,created_at,updated_at)
                    VALUES ($lastInsert, '$path_location', '$timestamp','$timestamp')";

                    $result = $conn->query($sql_document);
                }
            }
    
            $sql = null;
        }
        elseif($action == 'update')
        {
            
            $sql = "UPDATE inv_product  SET name='$_POST[name]',product_category_id='$_POST[product_category_id]',product_code='$_POST[product_code]',sales_price='$_POST[sales_price]',buy_price='$_POST[buy_price]',
            low_quantity_alert='$_POST[low_quantity_alert]',description='$_POST[description]',updated_by=$emp_id,updated_at=current_timestamp() WHERE id='$_POST[id]'";
            
            if(isset($_FILES['document_list'])){
                foreach($_FILES['document_list'] AS $k => $v){
                    $i = 0;

                    foreach( $v AS $v2){
                        
                        $attach_file[$i][$k] = $v2['attachment'];

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

                    $sql_document = "INSERT INTO inv_product_attachment (product_id, attachment_path,created_at,updated_at)
                    VALUES ('$_POST[id]', '$path_location', '$timestamp','$timestamp')";

                    $result = $conn->query($sql_document);
                }
            }

            postAction('Product',$action,$sql,"Location:../resource/product/index.php");
        }
        
        elseif($action == 'delete')
        {
            $sql = "UPDATE inv_product  SET deleted_at=current_timestamp() where id='$_POST[id]'";

            postActionAjax('Product',$sql);

            echo json_encode(['url' => '../product/index.php' , 'status'=>'success']);
        }

        postAction('Product',$action,$sql,"Location:../resource/product/index.php");
        
    }
    else
    {
        $id =  isset($_GET['id']) ? $_GET['id'] : null;

        $action =  isset($_GET['action']) ? $_GET['action'] : null;


        if($id){
            $sql = "SELECT * FROM inv_product  WHERE id=".$id;
            
            $result = mysqli_query($conn, $sql);

            $sqlAttachment = "SELECT * FROM inv_product_attachment  WHERE product_id=".$id." and deleted_at IS NULL";

            $resultAttachment = mysqli_query($conn, $sqlAttachment);

        }
        elseif($action == 'list')
        {
            $comp_id = $_SESSION['company'];
            $status = SoftDelete::CREATED;

            $sql = "SELECT a.id , a.name as name, a.created_at as created_at, b.name as category_name 
                    FROM inv_product a 
                    LEFT JOIN inv_product_category b ON a.product_category_id = b.id 
                    where a.deleted_at IS NULL
                    and a.company_id = '$comp_id'
                    ORDER BY a.created_at desc";
                    
            $result = mysqli_query($conn, $sql);

            $x = 0;
            
            while ($row = mysqli_fetch_array($result)) {
                
                $x += 1;
                $id = $row['id'];
                $name = $row['name'];
                $category_name = $row['category_name'];
                $date_created = isset($row['created_at']) ? date('d-m-Y H:i',strtotime($row['created_at'])) : null ;

                echo '
                <tr>
                    <td>'.$x.'</td>
                    <td>' .$name. '</td>
                    <td>' .$category_name.'</td>
                    <td>' .$date_created.'</td>

                    <td class="text-center">

                        <a class="btn btn-sm btn-warning" href="edit.php?id='.$id.'">Edit</a>

                        <button class="btn btn-sm btn-danger product_delete" value="'.$id.'">Delete</button>

                    </td>
                </tr>
                ';
            }
        }
    }

    if (isset($_GET['deleteAttachment'])) {
        $id = $_GET['deleteAttachment'];
        
        $sql = "UPDATE inv_product_attachment  SET deleted_at=current_timestamp() where id='$id'";
            
            postActionAjax('Product attachment',$sql);
            
            $previousPage = $_SERVER["HTTP_REFERER"];
            header('Location: '.$previousPage);
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