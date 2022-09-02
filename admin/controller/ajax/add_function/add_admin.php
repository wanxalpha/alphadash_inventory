<?php
include_once("../../../include/config.php");

mysqli_set_charset($conn, "utf8");

date_default_timezone_set("Asia/Kuala_Lumpur");
$t = time();
$now = date("Y-m-d H:i:s", $t);
$curdate = date("Y-m-d", $t);
$year = date("Y", $t);
$hour = date("H", $t);
$minute = date("i", $t);

//company information
$first_name = htmlspecialchars($_POST['first_name']);
$last_name = htmlspecialchars($_POST['last_name']);
$emp_id = htmlspecialchars($_POST['emp_id']);
$com_email = htmlspecialchars($_POST['com_email']);
$contact = htmlspecialchars($_POST['contact']);
$address = htmlspecialchars($_POST['address']);
$com_name = htmlspecialchars($_POST['com_name']);
$password = htmlspecialchars($_POST['password']);

$query = "SELECT * FROM company WHERE f_delete='N' AND f_company_name='$com_name'";
$result = mysqli_query($conn, $query);
$nums = mysqli_num_rows($result);

if($nums == 0){
    $sql2 = "INSERT INTO company (f_company_name, f_contact, f_address, f_created_date, f_modified_date) VALUES ('$com_name', '$contact', '$address', '$now', '$now')";
    $result2 = mysqli_query($conn, $sql2);

    $company_id = mysqli_insert_id($conn);

    $sql = "INSERT INTO employees (f_emp_id, f_company_id, f_first_name, f_last_name, f_com_email, f_emp_status, f_password, f_user_level, f_created_date, f_modified_date) VALUES ('$emp_id', '$company_id', '$first_name', '$last_name', '$com_email', '1',  '$password', 'Master', '$now', '$now')";
    $result = mysqli_query($conn, $sql);
}else{
    while($rows = mysqli_fetch_array($result)){
        $company_id = $rows['f_id'];

        $sql = "INSERT INTO employees (f_emp_id, f_company_id, f_first_name, f_last_name, f_com_email, f_emp_status, f_password, f_user_level, f_created_date, f_modified_date) VALUES ('$emp_id', '$company_id', '$first_name', '$last_name', '$com_email', '1',  '$password', 'Master', '$now', '$now')";
        $result = mysqli_query($conn, $sql);
    }
}

// echo $sql; exit; 

if ($result) {
    echo "<script>alert('Master Has Been Added.');</script>";
    echo "<script>window.location.href='../../../../auth/login.php';</script>";
    // echo '1';
} else {
    echo "<script>alert('Something Went Wrong');</script>";
    // echo '0';
}

$dbh = null;

?>
