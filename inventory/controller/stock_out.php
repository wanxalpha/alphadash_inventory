<?php 
    include 'global_function.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $action =  isset($_POST['action']) ? $_POST['action'] : null;

        if($action == 'create')
        {
            $comp_id = $_SESSION['company'];

            if(isset($_FILES['attachment'])){
                $attachment = $_FILES['attachment'];
                
                $fileTmpPath = $attachment['tmp_name'];
                    
                $file_type = mimeType($attachment['type']);

                $random_name = generateRandomString();

                $path_location = 'file/'.$random_name.'.'.$file_type;

                $dest_path = '../'.$path_location;
                
                move_uploaded_file($fileTmpPath, $dest_path);
                $timestamp = date('Y-m-d H:i:s');
            }

            $sql = "INSERT INTO inv_stock_out (company_id,stakeholder_id,reference_number,date,remark,attachment,created_by,created_at) 
            VALUES ('$comp_id', '$_POST[stakeholder_id]','$_POST[reference_number]','$_POST[date]','$_POST[remark]','$path_location',$emp_id,current_timestamp())";

            $result = $conn->query($sql);

            $lastInsert = $conn->insert_id;

            $products = $_POST['product_list'];
            
            foreach ($products as $key => $product) {

                $product_id = $product['product_id'];
                $quantity = $product['quantity'];
                // $expired_date = $product['expired_date'];
                
                $sql_product = "INSERT INTO inv_stock_out_product (stock_out_id,product_id,quantity,created_by,created_at) 
                VALUES ('$lastInsert','$product_id','$quantity',$emp_id,current_timestamp())";

                $result = $conn->query($sql_product);
                echo($result);
                // exit();
            }
    
            $sql = null;
        }
        elseif($action == 'update')
        {
            $emp_id = $_SESSION['emp_id'];

            if(isset($_FILES['attachment'])){
                echo('masuk a');
                $attachment = $_FILES['attachment'];
                
                $fileTmpPath = $attachment['tmp_name'];
                    
                $file_type = mimeType($attachment['type']);

                $random_name = generateRandomString();

                $path_location = 'file/'.$random_name.'.'.$file_type;

                $dest_path = '../'.$path_location;
                
                move_uploaded_file($fileTmpPath, $dest_path);
                $timestamp = date('Y-m-d H:i:s');
            }else{
                $path_location = $_POST['attachment'];
            }

            $sql = "UPDATE inv_stock_out SET stakeholder_id='$_POST[stakeholder_id]',reference_number='$_POST[reference_number]',date='$_POST[date]',remark='$_POST[remark]',attachment='$path_location',
                    updated_at=current_timestamp(),updated_by='$emp_id'
                    WHERE id='$_POST[id]'";

            $result = $conn->query($sql);

            $products = $_POST['product_list'];
            
            foreach ($products as $key => $product) {

                $product_id = $product['product_id'];
                $quantity = $product['quantity'];
                $expired_date = $product['expired_date'];

                $sql_product = "INSERT INTO inv_stock_out_product (stock_out_id,product_id,quantity,expired_date,created_by,created_at) 
                VALUES ('$lastInsert','$_POST[id]','$quantity','$expired_date',$emp_id,current_timestamp())";

                $result = $conn->query($sql_product);

                $sql_available_stock = "SELECT * FROM inv_available_stock where product_id='$product_id'";
                $result_available_stock = mysqli_query($conn, $sql_available_stock);
                $stock = $result_available_stock->fetch_assoc();
                
                if($stock['product_id']){
                    $available_quantity = $stock['quantity'] + $quantity;

                    $sql_update_available_stock = "UPDATE inv_available_stock  SET quantity='$available_quantity' WHERE product_id='$product_id'";

                    $result = $conn->query($sql_update_available_stock);
                }else{
                    $sql_add_available_stock = "INSERT INTO inv_available_stock (product_id,quantity) 
                    VALUES ('$product_id','$quantity')";

                    $result = $conn->query($sql_add_available_stock);
                }
            }
        }
        elseif($action == 'delete')
        {
            
            $sql = "UPDATE inv_stock_out  SET deleted_at=current_timestamp() where id='$_POST[id]'";

            postActionAjax('Stock Out',$sql);

            $sql_stock_out_product = "SELECT * FROM inv_stock_out_product WHERE stock_out_id='$_POST[id]' and deleted_at is null";
            $result_stock_out_product = mysqli_query($conn, $sql_stock_out_product);

            foreach($result_stock_out_product as $product){

                $sql_update_stock_out_product = "UPDATE inv_stock_out_product SET deleted_at=current_timestamp() where id='$product[id]'";
                postActionAjax('Stock Out',$sql_update_stock_out_product);
            }

            echo json_encode(['url' => '../stock_out/index.php' , 'status'=>'success']);

            exit();
        }
        
        postAction('Stock Out',$action,$sql,"Location:../resource/stock_out/index.php");
    }
    else
    {
        $id =  isset($_GET['id']) ? $_GET['id'] : null;

        $action =  isset($_GET['action']) ? $_GET['action'] : null;


        if($id){
            $sql = "SELECT * FROM inv_stock_out  WHERE id=".$id;

            $sqlProduct = "SELECT a.id, a.quantity as quantity, a.expired_date as expired_date, b.name as product_name  
                            FROM inv_stock_out_product a  
                            LEFT JOIN inv_product b ON a.product_id = b.id
                            WHERE a.stock_out_id=".$id." AND a.deleted_at IS NULL";

            $result = mysqli_query($conn, $sql);

            $resultProduct = mysqli_query($conn, $sqlProduct);

        }
        elseif($action == 'list')
        {
            $comp_id = $_SESSION['company'];

            $query =  " where a.deleted_at IS NULL and company_id = '$comp_id'";

            if(isset($_GET["month"]) ? $_GET["month"] : null ){
                $query = $query." AND MONTH(a.created_at) = ".$_GET['month'];
            }

            if(isset($_GET["year"]) ? $_GET["year"] : null ){
                $query = $query." AND YEAR(a.created_at) = ".$_GET['year'];
            }

            if(isset($_GET["stakeholder"]) ? $_GET["stakeholder"] : null ){
                $query = $query." AND a.stakeholder_id = ".$_GET['stakeholder'];
            }

            $sql = "SELECT a.id , a.reference_number as reference_number, a.status as status,a.created_at as created_at, b.f_first_name as stakeholder_name 
                    FROM inv_stock_out a 
                    LEFT JOIN employees b ON a.stakeholder_id = b.f_id 
                    $query
                    ORDER BY a.created_at desc";

            $result = mysqli_query($conn, $sql);

            $x = 0;
            
            while ($row = mysqli_fetch_array($result)) {
                
                $x += 1;
                $id = $row['id'];
                $stakeholder_name = $row['stakeholder_name'];
                $reference_number = $row['reference_number'];
                $date_created = isset($row['created_at']) ? date('d-m-Y H:i',strtotime($row['created_at'])) : null ;

                if($row['status'] == '0'){
                    $status = 'Open';
                }else{
                    $status = 'Validated';
                }
                if($row['status'] == '0'){
                    echo '
                    <tr>
                        <td>'.$x.'</td>
                        <td>' .$stakeholder_name. '</td>
                        <td>' .$reference_number.'</td>
                        <td>' .$status.'</td>
                        <td>' .$date_created.'</td>

                        <td class="text-center">
                            <a class="btn btn-sm btn-warning" href="edit.php?id='.$id.'">Edit</a>
                            <button class="btn btn-sm btn-danger stock_out_delete" value="'.$id.'">Delete</button>
                        </td>
                    </tr>
                    ';
                }else{
                    echo '
                    <tr>
                        <td>'.$x.'</td>
                        <td>' .$stakeholder_name. '</td>
                        <td>' .$reference_number.'</td>
                        <td>' .$status.'</td>
                        <td>' .$date_created.'</td>

                        <td class="text-center">
                            <a class="btn btn-sm btn-warning" href="view.php?id='.$id.'">View</a>
                        </td>
                    </tr>
                    ';
                }
            }
        } elseif($action == 'stock-available'){
            $sql = "SELECT * FROM inv_available_stock WHERE product_id=$_GET[product_id]";
            
            $result = mysqli_query($conn, $sql);

            if ($row = mysqli_fetch_array($result)) {

                echo ''.$row['quantity'].'';
            }else{
                echo '0';

            }
        } elseif($action == 'export'){

            $query =  ' where a.deleted_at IS NULL AND c.deleted_at IS NULL';

            $month = isset($_GET["month"]) ? $_GET["month"] : null;

            $stakeholder = isset($_GET["stakeholder"]) ? $_GET["stakeholder"] : null;
        
            if(isset($_GET["month"]) ? $_GET["month"] : null ){
                $query = $query." AND MONTH(a.date) = ".$_GET['month'];
            }

            if(isset($_GET["year"]) ? $_GET["year"] : null ){
                $query = $query." AND YEAR(a.created_at) = ".$_GET['year'];
            }
            
            if(isset($_GET["stakeholder"]) ? $_GET["stakeholder"] : null ){
                $query = $query." AND a.stakeholder_id = ".$_GET['stakeholder'];
            }

            $filename = date("Y-m-d")."-stock_out.csv";

            header('Content-Type: text/csv; charset=utf-8');  
            header("Content-Disposition: attachment;  filename=\"$filename\"");
            $output = fopen("php://output", "w");  
            fputcsv($output, array('Stakeholder', 'Reference Number', 'Date', 'Remark','Product Name','Quantity','Price per unit (RM)','Total (RM)','Status'));

            $query = "SELECT b.name AS stakeholder_name, a.reference_number, a.date, a.remark, d.name AS product_name, c.quantity, d.sales_price, SUM(c.quantity * d.sales_price) AS total, e.name
            from inv_stock_out AS a
            LEFT JOIN inv_contact AS b ON a.stakeholder_id = b.id
            LEFT JOIN inv_stock_out_product AS c ON a.id = c.stock_out_id
            LEFT JOIN inv_product AS d ON c.product_id = d.id
            LEFT JOIN inv_status as e ON a.status = e.id
            $query
            GROUP BY b.name,a.reference_number,a.date, a.remark, d.name, c.quantity, d.sales_price, e.name";  
            

            $result = $conn->query($query);
            
            while($row = mysqli_fetch_assoc($result))  
            {  
                fputcsv($output, $row);  
            }  
            fclose($output);  

        }
    }

    if (isset($_GET['deleteProduct'])) {
        $id = $_GET['deleteProduct'];
        
        $sql = "UPDATE inv_stock_out_product SET deleted_at=current_timestamp() where id='$id'";
            
            postActionAjax('Product',$sql);
            
            $previousPage = $_SERVER["HTTP_REFERER"];
            header('Location: '.$previousPage);
    }

    if (isset($_GET['validate'])) {
        $id = $_GET['validate'];

        $sql = "UPDATE inv_stock_out  SET status='1', updated_at=current_timestamp() where id='$id'";
        
        $result = mysqli_query($conn, $sql);
        
        $sql_stock_out_product = "SELECT * FROM inv_stock_out_product WHERE stock_out_id='$id' and deleted_at is null";
        $result_stock_out_product = mysqli_query($conn, $sql_stock_out_product);

        foreach($result_stock_out_product as $product){
                $sql_available_stock = "SELECT * FROM inv_available_stock where product_id='$product[product_id]'";
                $result_available_stock = mysqli_query($conn, $sql_available_stock);
                $stock = $result_available_stock->fetch_assoc();

                if($stock['product_id']){

                    $available_quantity = $stock['quantity'] - $product['quantity'];

                    $sql_update_available_stock = "UPDATE inv_available_stock  SET quantity='$available_quantity' WHERE product_id='$product[product_id]'";
                    

                    $result = $conn->query($sql_update_available_stock);
                }else{
                    $sql_add_available_stock = "INSERT INTO inv_available_stock (product_id,quantity) 
                    VALUES ('$product[product_id]','$product[quantity]')";
                    $result = $conn->query($sql_add_available_stock);
                }
        }
        $sql = null;
        $action = 'validate';
        postAction('Stock In',$action,$sql,"Location:../resource/stock_out/index.php");
            
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