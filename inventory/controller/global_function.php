<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// error_reporting(0);

include 'config.php';
include 'Lookup/GlobalLookup.php';


if (strlen($_SESSION['userlogin']) == 0) {
    header('location:../../auth/login.php');
}
    $emp_id = $_SESSION['emp_id'];

    // $sql = "SELECT company.f_logo,employees.f_first_name,employees.f_last_name,employees.f_emp_id,employees.f_designation,employees.f_picture,designations.f_position FROM employees
    // LEFT JOIN designations ON employees.f_designation = designations.f_id
    // LEFT JOIN company ON employees.f_company_id = company.f_id
    // WHERE employees.f_id=$emp_id";


    $sql = "SELECT company.COMPANY_LOGO,employees.FULLNAME,employees.EMPLOYEE_ID,employees.DESIGNATION,employees.PROFILE_PICTURE,designations.DESIGNATION_NAME 
            FROM employees
            LEFT JOIN designations ON employees.DESIGNATION = designations.DESIGNATION_ID
            LEFT JOIN company ON employees.COMPANY_ID = company.COMPANY_ID
            WHERE employees.EMPLOYEE_ID=$emp_id";


    $result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_array($result)) {
        $emp_name = $row['FULLNAME'];
        $emp_code = $row['EMPLOYEE_ID'];
        $designation = $row['DESIGNATION'];
        $emp_pic = $row['PROFILE_PICTURE'];
        $post_name = $row['DESIGNATION_NAME'];
        $company_logo = isset($row['COMPANY_LOGO']) ? $row['COMPANY_LOGO'] : 'logo.png';
    }

function postAction($type,$next_action,$sql,$route)
{   
    global $conn;

    if($sql){
        $result = $conn->query($sql);
    }
    else $result = true;

    if($result == true && $next_action == 'create') $_SESSION["session_toast_message"] = 'Success Create '.$type;

    elseif($result == true && $next_action == 'update') $_SESSION["session_toast_message"] = 'Success Update '.$type;

    elseif($result == true && $next_action == 'upload_excel') $_SESSION["session_toast_message"] = 'Success Upload Excel '.$type;

    elseif($result == true && $next_action == 'validate') $_SESSION["session_toast_message"] = 'Success Validated '.$type;

    elseif($result == true && $next_action == 'retrieved') $_SESSION["session_toast_message"] = 'Success Returned '.$type;

    elseif($result == true && $next_action == 'failed_action') $_SESSION["session_toast_message"] = 'There is active employee(s) under this category';

    else $_SESSION["session_toast_message"] = 'Failed';

    if($next_action == 'failed_action'){
        $_SESSION["session_toast_type"] = 'error';
    }else{
        $_SESSION["session_toast_type"] = $result == true ? 'success' : 'error';
    }
    // echo $conn->error;
    header($route);

    return true;
}

function postActionFailed($next_action,$route)
{   
    if($next_action == 'failed_update_stakeholder') $_SESSION["session_toast_message"] = 'There is active employee(s) under this category';

    elseif($next_action == 'failed_update_product_category') $_SESSION["session_toast_message"] = 'There is active product(s) under this category ';

    elseif($next_action == 'failed_stock_out_quantity') $_SESSION["session_toast_message"] = 'Exceeded available product';

    elseif($next_action == 'validate') $_SESSION["session_toast_message"] = 'Success Validated ';

    elseif($next_action == 'retrieved') $_SESSION["session_toast_message"] = 'Success Returned ';

    elseif($next_action == 'failed_action') $_SESSION["session_toast_message"] = 'There is active user(s) under this category';

    else $_SESSION["session_toast_message"] = 'Failed';

    $_SESSION["session_toast_type"] = 'error';
    echo($next_action);exit();
    header($route);

    return true;
}

function postActionAjax($type,$sql){

    unset($_SESSION['session_toast_message']);
    unset($_SESSION['session_toast_type']);

    global $conn;
    if($sql){
        $result = $conn->query($sql);

        if($result == true ) $_SESSION["session_toast_message"] = 'Success Delete '.$type;

        else $_SESSION["session_toast_message"] = 'Delete Failed';

        $_SESSION["session_toast_type"] = $result == true ? 'success' : 'error';
    }else{
        $_SESSION["session_toast_message"] = 'Delete Failed';

        $_SESSION["session_toast_type"] = 'error';
    }
        return true;

}

function postActionAjaxFailed($type){

    unset($_SESSION['session_toast_message']);
    unset($_SESSION['session_toast_type']);
    
    if($type == 'failed_update_stakeholder') $_SESSION["session_toast_message"] = 'There is active user(s) under this category';

    elseif($type == 'failed_update_product_category') $_SESSION["session_toast_message"] = 'There is active product(s) under this category';

    $_SESSION["session_toast_type"] = 'error';

    return true;

}

function getSalesPerson(){
    global $conn;
    $comp_id = $_SESSION['company'];

    $sql = "SELECT employees.f_id,employees.f_first_name,employees.f_last_name FROM employees 
            INNER JOIN departments ON employees.f_department = departments.f_id
            where departments.f_code = 'SM' AND employees.f_company_id=".$comp_id;

    return $result_sales_person = mysqli_query($conn, $sql);

}

function getProductCategory(){
    global $conn;
    $comp_id = $_SESSION['company'];

    $sql = "SELECT id,name 
            FROM inv_product_category 
            where deleted_at IS NULL and company_id = '$comp_id'";

    return $result_product_category = mysqli_query($conn, $sql);

}

function getProduct(){
    global $conn;
    $comp_id = $_SESSION['company'];

    $sql = "SELECT a.id,a.name 
            FROM inv_product AS a
            where a.deleted_at IS NULL and a.company_id = '$comp_id'";
    return $result_product = mysqli_query($conn, $sql);
}

function getProductMerchant(){
    global $conn;
    $comp_id = $_SESSION['company'];

    $sql = "SELECT a.id,a.name,b.quantity 
            FROM inv_product AS a
            LEFT JOIN inv_available_stock AS b ON a.id = b.product_id 
            where a.deleted_at IS NULL and a.company_id = '$comp_id' AND b.quantity IS NOT NULL";
    return $result_product = mysqli_query($conn, $sql);
}

function getProductRetailer(){
    global $conn;
    $comp_id = $_SESSION['company'];
    $emp_id = $_SESSION['emp_id'];

    $sql = "SELECT a.id,a.name,b.quantity 
            FROM inv_product AS a
            LEFT JOIN inv_available_stock_customer AS b ON a.id = b.product_id 
            where a.deleted_at IS NULL and b.stakeholder_id = '$emp_id' and a.company_id = '$comp_id' AND b.quantity IS NOT NULL";

    return $result_product = mysqli_query($conn, $sql);
}

function getSupplier(){
    global $conn;
    $comp_id = $_SESSION['company'];

    $sql = "SELECT EMPLOYEE_ID as id,FULLNAME as name 
            FROM employees
            where DESIGNATION = '3' and DELETE_IND = 'N' and COMPANY_ID = '$comp_id'";

    return $result_stakeholder = mysqli_query($conn, $sql);

}

function getRetailer(){
    global $conn;
    $comp_id = $_SESSION['company'];

    $sql = "SELECT EMPLOYEE_ID as id,FULLNAME as name
            FROM employees
            where DESIGNATION = '2' and DELETE_IND = 'N' and COMPANY_ID = '$comp_id'";

    return $result_stakeholder = mysqli_query($conn, $sql);

}

function getCustomer(){
    global $conn;
    $comp_id = $_SESSION['company'];
    $emp_id = $_SESSION['emp_id'];

    $sql = "SELECT id as id,name
            FROM inv_customer
            where company_id = '$comp_id' and retailer_id = '$emp_id' and deleted_at IS NULL";

    return $result_stakeholder = mysqli_query($conn, $sql);

}

function getStakeholderCategory(){
    global $conn;
    // $comp_id = $_SESSION['company'];

    $sql = "SELECT id,name 
            FROM inv_stakeholder_category 
            WHERE deleted_at IS NULL
            AND id NOT IN (5,4)";

    return $result_stakeholder_category = mysqli_query($conn, $sql);

}


function getSalesPersonDetails(){
    global $conn;
    $comp_id = $_SESSION['company'];

    $sql = "SELECT employees.f_id,employees.f_first_name,employees.f_last_name FROM employees 
            INNER JOIN departments ON employees.f_department = departments.f_id
            where departments.f_code = 'SM' AND employees.f_company_id=".$comp_id;

    $result_sales_person = mysqli_query($conn, $sql);

    while ($sales = mysqli_fetch_array($result_sales_person)){

        $data[] = [
            'f_id' => $sales['f_id'],
            'name' => $sales['f_first_name'].' '.$sales['f_last_name']
        ];
    }
    return  $data;

}

function getPillar($product = false){
    global $conn;
    $comp_id = $_SESSION['company'];
    
    $query = $product ? " AND project_code='$product' " : null ;

    $sql = "SELECT * FROM project_pillar where status = '1' 
            AND f_id_com = $comp_id $query
            ORDER BY updated_at desc";

    return  mysqli_query($conn, $sql);

}

function listYear(){

    $list_year = [2022,2021,2020,2019,2018,2017];

    return $list_year;
}

function listMonth($all = false){
    
    if($all == true) {
        $list_month = [
            '01' => 'Jan',
            '02' => 'Feb',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'Aug',
            '09' => 'Sep',
            '10' => 'Oct',
            '11' => 'Nov',
            '12' => 'Dec'
        ];
    }
    else{
        $list_month = [
            '' => 'All',
            '01' => 'Jan',
            '02' => 'Feb',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'Aug',
            '09' => 'Sep',
            '10' => 'Oct',
            '11' => 'Nov',
            '12' => 'Dec'
        ];
    }

    return $list_month;
}

function getProjectSector($id){
    global $conn;
    $comp_id = $_SESSION['company'];

    $sql = "SELECT * FROM project_sector WHERE Category=$id AND CompanyId=$comp_id ORDER BY Name asc";
            
    return $result = mysqli_query($conn, $sql);
}

function getProjectCategory(){
    global $conn;
    $comp_id = $_SESSION['company'];

    $sql = "SELECT * FROM project_category WHERE CompanyId=$comp_id ORDER BY Name asc";
            
    return $result = mysqli_query($conn, $sql);
}

?>