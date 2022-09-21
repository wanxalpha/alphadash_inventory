<?php 
    include 'global_function.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        $action =  isset($_POST['action']) ? $_POST['action'] : null;

        if($action == 'create')
        {

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

            $sql = "INSERT INTO inv_stock_in (stakeholder_id,reference_number,date,remark,attachment,created_by,created_at) 
            VALUES ('$_POST[stakeholder_id]','$_POST[reference_number]','$_POST[date]','$_POST[remark]','$path_location',$emp_id,current_timestamp())";

            $result = $conn->query($sql);

            $lastInsert = $conn->insert_id;

            $products = $_POST['product_list'];
            
            foreach ($products as $key => $product) {

                $product_id = $product['product_id'];
                echo($product_id.'|');
                $quantity = $product['quantity'];
                $expired_date = $product['expired_date'];

                $sql_product = "INSERT INTO inv_stock_in_product (stock_in_id,product_id,quantity,expired_date,created_by,created_at) 
                VALUES ('$lastInsert','$product_id','$quantity','$expired_date',$emp_id,current_timestamp())";

                $result = $conn->query($sql_product);

            }
    // exit();
            $sql = null;
        }
        elseif($action == 'update')
        {
            $emp_id = $_SESSION['emp_id'];

            if(isset($_FILES['attachment'])){

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

            $sql = "UPDATE inv_stock_in SET stakeholder_id='$_POST[stakeholder_id]',reference_number='$_POST[reference_number]',date='$_POST[date]',remark='$_POST[remark]',attachment='$path_location',
                    updated_at=current_timestamp(),updated_by='$emp_id'
                    WHERE id='$_POST[id]'";

            $result = $conn->query($sql);

            $products = $_POST['product_list'];
            
            foreach ($products as $key => $product) {
                
                $product_id = $product['product_id'];
                // echo($product_id);exit();
                $quantity = $product['quantity'];
                $expired_date = $product['expired_date'];

                $sql_product = "INSERT INTO inv_stock_in_product (stock_in_id,product_id,quantity,expired_date,created_by,created_at) 
                VALUES ('$_POST[id]','$product_id','$quantity','$expired_date',$emp_id,current_timestamp())";

                $result = $conn->query($sql_product);
            }
            // exit();
        }
        elseif($action == 'delete')
        {
            
            $sql = "UPDATE inv_stock_in  SET deleted_at=current_timestamp() where id='$_POST[id]'";

            postActionAjax('Stock In',$sql);

            $sql_stock_in_product = "SELECT * FROM inv_stock_in_product WHERE stock_in_id='$_POST[id]' and deleted_at is null";
            $result_stock_in_product = mysqli_query($conn, $sql_stock_in_product);

            foreach($result_stock_in_product as $product){

                $sql_update_stock_in_product = "UPDATE inv_stock_in_product SET deleted_at=current_timestamp() where id='$product[id]'";
                postActionAjax('Stock Out',$sql_update_stock_in_product);
            }

            echo json_encode(['url' => '../stock_in/index.php' , 'status'=>'success']);

            exit();
        }
        
        postAction('Stock In',$action,$sql,"Location:../resource/stock_in/index.php");
    }
    else
    {
        $id =  isset($_GET['id']) ? $_GET['id'] : null;

        $action =  isset($_GET['action']) ? $_GET['action'] : null;


        if($id){
            $sql = "SELECT * FROM inv_stock_in  WHERE id=".$id;

            $sqlProduct = "SELECT a.id, a.quantity as quantity, a.expired_date as expired_date, b.name as product_name  
                            FROM inv_stock_in_product a  
                            LEFT JOIN inv_product b ON a.product_id = b.id
                            WHERE a.stock_in_id=".$id." AND a.deleted_at IS NULL";

            $result = mysqli_query($conn, $sql);

            $resultProduct = mysqli_query($conn, $sqlProduct);

        }
        elseif($action == 'list')
        {
            $comp_id = $_SESSION['company'];
            $emp_id = $_SESSION['emp_id'];

            $sql = "SELECT a.id , a.quantity as quantity, b.name as name, b.low_quantity_alert as low_quantity_alert, c.name as category_name
                    FROM inv_available_stock_customer a 
                    LEFT JOIN inv_product b ON a.product_id = b.id 
                    LEFT JOIN inv_product_category c on b.product_category_id = c.id
                    WHERE b.company_id = '$comp_id'
                    AND a.stakeholder_id = '$emp_id'
                    ORDER BY b.name desc";

            $result = mysqli_query($conn, $sql);

            $x = 0;
            
            while ($row = mysqli_fetch_array($result)) {
                
                $x += 1;
                $id = $row['id'];
                $quantity = $row['quantity'];
                $name = $row['name'];
                $category_name = $row['category_name'];

                $checkRow = checkQuantityAlert($row['quantity'], $row['low_quantity_alert']);

                    echo '
                    <tr>
                        <td>' .$x. ' </td>
                        <td>' .$name. '</td>
                        <td>' .$category_name. '</td>
                        <td>' .$quantity.' </td>
                    </tr>
                    ';
            }
        }
    }

    if (isset($_GET['deleteProduct'])) {
        $id = $_GET['deleteProduct'];
        
        $sql = "UPDATE inv_stock_in_product SET deleted_at=current_timestamp() where id='$id'";
            
            postActionAjax('Product',$sql);
            
            $previousPage = $_SERVER["HTTP_REFERER"];
            header('Location: '.$previousPage);
    }

    if($action == 'delete')
        {
            $sql = "UPDATE inv_stock_in  SET deleted_at=current_timestamp() where id='$_POST[id]'";
            postActionAjax('Stock In',$sql);

            echo json_encode(['url' => '../stock_in/index.php' , 'status'=>'success']);
        }

    if (isset($_GET['validate'])) {
        $id = $_GET['validate'];

        $sql = "UPDATE inv_stock_in  SET status='1', updated_at=current_timestamp() where id='$id'";
        
        $result = mysqli_query($conn, $sql);
        
        $sql_stock_in_product = "SELECT * FROM inv_stock_in_product WHERE stock_in_id='$id' and deleted_at is null";
        $result_stock_in_product = mysqli_query($conn, $sql_stock_in_product);

        foreach($result_stock_in_product as $product){
                $sql_available_stock = "SELECT * FROM inv_available_stock where product_id='$product[product_id]'";
                $result_available_stock = mysqli_query($conn, $sql_available_stock);
                $stock = $result_available_stock->fetch_assoc();

                if($stock['product_id']){

                    $available_quantity = $stock['quantity'] + $product['quantity'];

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
        postAction('Stock In',$action,$sql,"Location:../resource/stock_in/index.php");
            
    }

    function checkQuantityAlert($quantity, $low_quantity_alert){
        if($quantity == 0) return 0;

        if($quantity <= $low_quantity_alert){
            return '<i class="fas fa-exclamation-circle blink" style="color:red"></i>';
        }
    }

    function checkRow($quantity, $low_quantity_alert){
        if($quantity == 0) return 0;

        if($quantity <= $low_quantity_alert){
            return true;
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