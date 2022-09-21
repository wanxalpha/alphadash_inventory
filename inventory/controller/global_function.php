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

    $sql = "SELECT company.f_logo,employees.f_first_name,employees.f_last_name,employees.f_emp_id,employees.f_designation,employees.f_picture,designations.f_position FROM employees
            LEFT JOIN designations ON employees.f_designation = designations.f_id
            LEFT JOIN company ON employees.f_company_id = company.f_id
            WHERE employees.f_id=$emp_id";


    $result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_array($result)) {
        $emp_name = $row['f_first_name'] .' ' .$row['f_last_name'];
        $emp_code = $row['f_emp_id'];
        $designation = $row['f_designation'];
        $emp_pic = $row['f_picture'];
        $post_name = $row['f_position'];
        $company_logo = isset($row['f_logo']) ? $row['f_logo'] : 'logo.png';
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

    elseif($result == true && $next_action == 'retrieved') $_SESSION["session_toast_message"] = 'Success Retrieved '.$type;

    else $_SESSION["session_toast_message"] = 'Failed';

    $_SESSION["session_toast_type"] = $result == true ? 'success' : 'error';
    
    // echo $conn->error;
    header($route);

    return true;
}

function postActionAjax($type,$sql){

    unset($_SESSION['session_toast_message']);
    unset($_SESSION['session_toast_type']);
    
    global $conn;

    $result = $conn->query($sql);

    if($result == true ) $_SESSION["session_toast_message"] = 'Success Delete '.$type;

    else $_SESSION["session_toast_message"] = 'Delete Failed';

    $_SESSION["session_toast_type"] = $result == true ? 'success' : 'error';

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

    $sql = "SELECT id,name 
            FROM inv_product 
            where deleted_at IS NULL and company_id = '$comp_id'";

    return $result_product = mysqli_query($conn, $sql);

}

function getSupplier(){
    global $conn;
    $comp_id = $_SESSION['company'];

    $sql = "SELECT f_id as id,f_first_name as name 
            FROM employees
            where f_designation = '3' and f_delete = 'N' and f_company_id = '$comp_id'";

    return $result_stakeholder = mysqli_query($conn, $sql);

}

function getRetailer(){
    global $conn;
    $comp_id = $_SESSION['company'];

    $sql = "SELECT f_id as id,f_first_name as name 
            FROM employees
            where f_designation = '2' and f_delete = 'N' and f_company_id = '$comp_id'";

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