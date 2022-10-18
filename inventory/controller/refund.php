<?php 
    include 'global_function.php';
    include_once 'dompdf/autoload.inc.php'; 
    use Dompdf\Dompdf;
    use Dompdf\Options;

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

            $sql = "INSERT INTO inv_refund (company_id,stakeholder_id,reference_number,date,remark,attachment,created_by,created_at) 
            VALUES ('$comp_id','$_POST[stakeholder_id]','$_POST[reference_number]','$_POST[date]','$_POST[remark]','$path_location',$emp_id,current_timestamp())";

            $result = $conn->query($sql);

            $lastInsert = $conn->insert_id;

            $products = $_POST['product_list'];
            
            foreach ($products as $key => $product) {

                $product_id = $product['product_id'];
                $quantity = $product['quantity'];
                $remark = $product['remark'];

                $sql_product = "INSERT INTO inv_refund_product (refund_id,product_id,quantity,remark,created_by,created_at) 
                VALUES ('$lastInsert','$product_id','$quantity','$remark',$emp_id,current_timestamp())";
                
                $result = $conn->query($sql_product);

            }

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

            $sql = "UPDATE inv_refund SET stakeholder_id='$_POST[stakeholder_id]',reference_number='$_POST[reference_number]',date='$_POST[date]',remark='$_POST[remark]',attachment='$path_location',
                    updated_at=current_timestamp(),updated_by='$emp_id'
                    WHERE id='$_POST[id]'";

            $result = $conn->query($sql);

            $products = $_POST['product_list'];
            
            foreach ($products as $key => $product) {
                
                $product_id = $product['product_id'];
                // echo($product_id);exit();
                $quantity = $product['quantity'];
                $remark = $product['remark'];

                $sql_product = "INSERT INTO inv_refund_product (refund_id,product_id,quantity,remark,created_by,created_at) 
                VALUES ('$_POST[id]','$product_id','$quantity','$remark',$emp_id,current_timestamp())";

                $result = $conn->query($sql_product);
            }
            // exit();
        }
        elseif($action == 'delete')
        {
            
            $sql = "UPDATE inv_refund  SET deleted_at=current_timestamp() where id='$_POST[id]'";

            postActionAjax('Refund',$sql);

            $sql_refund_product = "SELECT * FROM inv_refund_product WHERE refund_id='$_POST[id]' and deleted_at is null";
            $result_refund_product = mysqli_query($conn, $sql_refund_product);

            foreach($result_refund_product as $product){

                $sql_update_refund_product = "UPDATE inv_refund_product SET deleted_at=current_timestamp() where id='$product[id]'";
                postActionAjax('Stock Out',$sql_update_refund_product);
            }

            echo json_encode(['url' => '../refund/index.php' , 'status'=>'success']);

            exit();
        }
        
        postAction('Refund',$action,$sql,"Location:../resource/refund/index.php");
    }
    else
    {
        $id =  isset($_GET['id']) ? $_GET['id'] : null;

        $action =  isset($_GET['action']) ? $_GET['action'] : null;


        if($id){
            $sql = "SELECT * FROM inv_refund  WHERE id=".$id;

            $sqlProduct = "SELECT a.id, a.quantity as quantity, a.remark as remark, b.name as product_name  
                            FROM inv_refund_product a  
                            LEFT JOIN inv_product b ON a.product_id = b.id
                            WHERE a.refund_id=".$id." AND a.deleted_at IS NULL";

            $result = mysqli_query($conn, $sql);

            $resultProduct = mysqli_query($conn, $sqlProduct);

        }
        elseif($action == 'list')
        {
            $comp_id = $_SESSION['company'];
            $designation_id = $_SESSION['designation'];
            $emp_id =  $_SESSION['emp_id'];

            if($designation_id == '3'){
                $query =  " where a.deleted_at IS NULL and a.company_id = '$comp_id'and a.stakeholder_id = '$emp_id'";
            }else{
                $query =  " where a.deleted_at IS NULL and company_id = '$comp_id'";
            }

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
                    FROM inv_refund a 
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
                }elseif($row['status'] == '1'){
                    $status = 'Validated';
                }elseif($row['status'] == '2'){
                    $status = 'Returned';
                }

                if(($_SESSION['designation'] != '3')){
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
                                <button class="btn btn-sm btn-danger refund_delete" value="'.$id.'">Delete</button>
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
                }else{
                    if($row['status'] == '1'){
                        echo '
                        <tr>
                            <td>'.$x.'</td>
                            <td>' .$stakeholder_name. '</td>
                            <td>' .$reference_number.'</td>
                            <td>' .$status.'</td>
                            <td>' .$date_created.'</td>

                            <td class="text-center">
                                <a class="btn btn-sm btn-warning" href="return.php?id='.$id.'">Edit</a>
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
            }
        } elseif($action == 'export'){

            $emp_id =  $_SESSION['emp_id'];
            $designation = $_SESSION['designation'];
            $comp_id = $_SESSION['company'];

            $query =  ' where a.deleted_at IS NULL AND c.deleted_at IS NULL AND a.company_id = '.$comp_id;
        
            if(isset($_GET["month"]) ? $_GET["month"] : null ){
                $query = $query." AND MONTH(a.date) = ".$_GET['month'];
            }

            if(isset($_GET["year"]) ? $_GET["year"] : null ){
                $query = $query." AND YEAR(a.created_at) = ".$_GET['year'];
            }

            if ($designation == '4'){
                if(isset($_GET["stakeholder"]) ? $_GET["stakeholder"] : null ){
                    $query = $query." AND a.stakeholder_id = ".$_GET['stakeholder'];
                }
            }elseif ($designation == '3'){
                $query = $query." AND a.stakeholder_id = ".$emp_id;
            }

            $filename = date("Y-m-d")."-stock_return.csv";

            header('Content-Type: text/csv; charset=utf-8');  
            header("Content-Disposition: attachment;  filename=\"$filename\""); 
            $output = fopen("php://output", "w");  
            fputcsv($output, array('Stakeholder', 'Reference Number', 'Date', 'Remark','Product Name','Quantity','Status'));

            $query = "SELECT b.f_first_name AS stakeholder_name, a.reference_number, a.date, a.remark, d.name AS product_name, c.quantity, e.name
            from inv_refund AS a
            LEFT JOIN employees AS b ON a.stakeholder_id = b.f_id
            LEFT JOIN inv_refund_product AS c ON a.id = c.refund_id
            LEFT JOIN inv_product AS d ON c.product_id = d.id
            LEFT JOIN inv_status as e ON a.status = e.id
            $query
            GROUP BY b.f_first_name,a.reference_number,a.date, a.remark, d.name, c.quantity, d.sales_price, e.name";  

            $result = $conn->query($query);
            
            while($row = mysqli_fetch_assoc($result))  
            {  
                fputcsv($output, $row);  
            }  
            fclose($output);  

        }elseif($action == 'exportPdf'){

            $emp_id = $_SESSION['emp_id'];
            $comp_id = $_SESSION['company'];
            $designation = $_SESSION['designation'];

            $query =  ' where a.deleted_at IS NULL AND c.deleted_at IS NULL AND a.company_id = '.$comp_id;
        
            if(isset($_GET["month"]) ? $_GET["month"] : null ){
                $query = $query." AND MONTH(a.date) = ".$_GET['month'];
            }

            if(isset($_GET["year"]) ? $_GET["year"] : null ){
                $query = $query." AND YEAR(a.created_at) = ".$_GET['year'];
            }

            if ($designation == '4'){
                if(isset($_GET["stakeholder"]) ? $_GET["stakeholder"] : null ){
                    $query = $query." AND a.stakeholder_id = ".$_GET['stakeholder'];
                }
            }elseif ($designation == '3'){
                $query = $query." AND a.stakeholder_id = ".$emp_id;
            }

            $company_query = "SELECT a.f_first_name, b.f_company_name, b.f_address as address
            FROM employees AS a
            LEFT JOIN company AS b ON a.f_company_id = b.f_id
            WHERE a.f_id = $emp_id";

            $result_company = $conn->query($company_query);

            $query = "SELECT b.f_first_name AS stakeholder_name, a.reference_number, a.date, a.remark, d.name AS product_name, c.quantity, e.name, c.remark as reason
            from inv_refund AS a 
            LEFT JOIN employees AS b ON a.stakeholder_id = b.f_id 
            LEFT JOIN inv_refund_product AS c ON a.id = c.refund_id 
            LEFT JOIN inv_product AS d ON c.product_id = d.id 
            LEFT JOIN inv_status as e ON a.status = e.id 
            $query
            GROUP BY b.f_first_name,a.reference_number,a.date, a.remark, d.name, c.quantity, d.sales_price, e.name, c.remark";  

            $result = $conn->query($query);
            
            $query_company = "SELECT * 
                                FROM company
                                WHERE f_id =$comp_id";
            $result_company = $conn->query($query_company);
            $row_company = mysqli_fetch_assoc($result_company);
       
            $html =  '<table width=100%>
                        <tr>
                            <td width=100 align=center ><img width="100" src="http://'.$_SERVER['HTTP_HOST'].'/admin/assets/img/avatars/'.$row_company['f_logo'].'" ></td>
                            <td colspan=8>
                                <ul class="list-unstyled text-center" style="list-style: none; text-align: LEFT; padding-right: 3;font-family: sans-serif">
                                    <li><b>'.$row_company['f_company_name'].'</b></li>
                                    <li>'.$row_company['f_address_1'].'</li>
                                    <li>'.$row_company['f_address_2'].'</li>
                                    <li>'.$row_company['f_address_3'].'</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=9 align=center style="font-family: sans-serif; min-height: 5px; padding: 5px; margin-bottom: 10px;background-color: #f5f5f5;border: 1px solid #e3e3e3; border-radius: 4px; -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05); box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05)">Stock Return</td>
                        </tr>
                    </table>
                    <br>
                    <table width=100% border=1 style="border-collapse: collapse;">
                        <tr>
                            <td style="font-size:11px; text-align: center; font-family: sans-serif"><b>No</b></td>
                            <td style="font-size:11px; text-align: center; font-family: sans-serif"><b>Stakeholder Name</b></td>
                            <td style="font-size:11px; text-align: center; font-family: sans-serif"><b>Reference Number</b></td>
                            <td style="font-size:11px; text-align: center; font-family: sans-serif"><b>Date</b></td>
                            <td style="font-size:11px; text-align: center; font-family: sans-serif"><b>Remark</b></td>
                            <td style="font-size:11px; text-align: center; font-family: sans-serif"><b>Product Name</b></td>
                            <td style="font-size:11px; text-align: center; font-family: sans-serif"><b>Quantity</b></td>
                            <td style="font-size:11px; text-align: center; font-family: sans-serif"><b>Reason</b></td>
                            <td style="font-size:11px; text-align: center; font-family: sans-serif"><b>Status</b></td>
                        </tr>';

                        // Query from mysql 
                        if (mysqli_num_rows($result) > 0) {
                            $x = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $x += 1;
                                $stakeholder_name = $row['stakeholder_name'];
                                $reference_number = $row['reference_number'];
                                $date = date("d/m/Y", strtotime($row['date']));
                                $remark = $row['remark'];
                                $product_name = $row['product_name'];
                                $quantity = $row['quantity'];
                                $name = $row['name'];
                                $reason = $row['reason'];

                                $html .= '<tr border=1>
                                            <td style="font-size:11px; text-align: center; font-family: sans-serif">'.$x.'</td>
                                            <td style="font-size:11px; text-align: center; font-family: sans-serif">'.$stakeholder_name.'</td>
                                            <td style="font-size:11px; text-align: center; font-family: sans-serif">'.$reference_number.'</td>
                                            <td style="font-size:11px; text-align: center; font-family: sans-serif">'.$date.'</td>
                                            <td style="font-size:11px; text-align: center; font-family: sans-serif">'.$remark.'</td>
                                            <td style="font-size:11px; text-align: center; font-family: sans-serif">'.$product_name.'</td>
                                            <td style="font-size:11px; text-align: center; font-family: sans-serif">'.$quantity.'</td>
                                            <td style="font-size:11px; text-align: center; font-family: sans-serif">'.$reason.'</td>
                                            <td style="font-size:11px; text-align: center; font-family: sans-serif">'.$name.'</td>
                                        </tr>';
                            }
                        }

                        $html .= '</table>
                                  <table>
                                    <tr>
                                        <td><tr>
                                        <td colspan=9 style="font-family: sans-serif"><h6><b>Notes: This is a computer generated document and no signature required</b></h6></td>
                                    </tr>
                                </table>';

                        $dompdf = new Dompdf(array('enable_remote' => true));

                        $dompdf->load_html($html);

                        $dompdf->render();
                        $dompdf->stream("Stock Return.pdf",array("Attachment"=>0));
                        $dompdf->clear();
        }
    }

    if (isset($_GET['deleteProduct'])) {
        $id = $_GET['deleteProduct'];
        
        $sql = "UPDATE inv_refund_product SET deleted_at=current_timestamp() where id='$id'";
            
            postActionAjax('Product',$sql);
            
            $previousPage = $_SERVER["HTTP_REFERER"];
            header('Location: '.$previousPage);
    }

    if($action == 'delete')
        {

            $sql = "UPDATE inv_refund  SET deleted_at=current_timestamp() where id='$_POST[id]'";

            postActionAjax('Refund',$sql);

            echo json_encode(['url' => '../refund/index.php' , 'status'=>'success']);
        }

    if (isset($_GET['validate'])) {
        $id = $_GET['validate'];

        $sql = "UPDATE inv_refund  SET status='1', updated_at=current_timestamp() where id='$id'";
        
        $result = mysqli_query($conn, $sql);
        
        $sql_refund_product = "SELECT * FROM inv_refund_product WHERE refund_id='$id' and deleted_at is null";
        $result_refund_product = mysqli_query($conn, $sql_refund_product);

        foreach($result_refund_product as $product){
                $sql_available_stock = "SELECT * FROM inv_available_stock where product_id='$product[product_id]'";
                $result_available_stock = mysqli_query($conn, $sql_available_stock);
                $stock = $result_available_stock->fetch_assoc();

                if($stock['product_id']){

                    $available_quantity = $stock['quantity'] - $product['quantity'];

                    $sql_update_available_stock = "UPDATE inv_available_stock  SET quantity='$available_quantity' WHERE product_id='$product[product_id]'";
                    

                    $result = $conn->query($sql_update_available_stock);
                }
        }
        $sql = null;
        $action = 'validate';
        postAction('Refund',$action,$sql,"Location:../resource/refund/index.php");
            
    }

    if (isset($_GET['retrieved'])) {
        $id = $_GET['retrieved'];

        $sql = "UPDATE inv_refund  SET status='2', updated_at=current_timestamp() where id='$id'";
        
        $result = mysqli_query($conn, $sql);
        
        $sql = null;
        $action = 'retrieved';
        postAction('Refund',$action,$sql,"Location:../resource/refund/index.php");
            
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