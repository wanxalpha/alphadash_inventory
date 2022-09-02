<?php
session_start();
// error_reporting(0);
include_once("config.php");

mysqli_set_charset($conn, "utf8");

date_default_timezone_set("Asia/Kuala_Lumpur");
$t = time();
$now = date("Y-m-d H:i:s", $t);
$curtime = date("H:i", $t);
$curdate = date("Y-m-d", $t);
$year = date("Y", $t);
$hour = date("H", $t);
$minute = date("i", $t);

//company information
$first_name = htmlspecialchars($_POST['FIRST_NAME']);
$last_name = htmlspecialchars($_POST['LAST_NAME']);
//$emp_id = htmlspecialchars($_POST['emp_id']);
$com_email = htmlspecialchars($_POST['EMAIL']);
$contact = htmlspecialchars($_POST['CONTACT_NUMBER']);
//$address = htmlspecialchars($_POST['address']);
$com_name = htmlspecialchars($_POST['COMPANY_NAME']);
$password = htmlspecialchars($_POST['PASSWORD']);

$query = "SELECT * FROM company WHERE f_delete='N' AND f_company_name='$com_name'";
$result = mysqli_query($conn, $query);
$nums = mysqli_num_rows($result);


if ($nums == 0) {
  $sql2 = "INSERT INTO company (f_company_name, f_contact, f_created_date, f_modified_date) VALUES ('$com_name', '$contact', '$now', '$now')";
  $result2 = mysqli_query($conn, $sql2);

  $company_id = mysqli_insert_id($conn);

  $sql = "INSERT INTO employees (f_company_id, f_first_name, f_last_name, f_com_email, f_emp_status, f_password, f_user_level, f_created_date, f_modified_date) VALUES ('$company_id', '$first_name', '$last_name', '$com_email', '1',  '$password', 'Master', '$now', '$now')";
  $result = mysqli_query($conn, $sql);
} else {
  while ($rows = mysqli_fetch_array($result)) {
    $company_id = $rows['f_id'];

    $sql = "INSERT INTO employees (f_company_id, f_first_name, f_last_name, f_com_email, f_emp_status, f_password, f_user_level, f_created_date, f_modified_date) VALUES ('$company_id', '$first_name', '$last_name', '$com_email', '1',  '$password', 'Master', '$now', '$now')";
    $result = mysqli_query($conn, $sql);
  }
}


$userChecking = "SELECT * FROM employees WHERE f_com_email='$com_email' AND f_password='$password' AND f_delete='N'";
$checkingResult = mysqli_query($conn, $userChecking);
$numC = mysqli_num_rows($checkingResult);

if ($numC == 1) {

  $row = mysqli_fetch_array($checkingResult);
  $emp_id = $row['f_id'];
  $emp_level = $row['f_user_level'];
  $company_id = $row['f_company_id'];

  $sql = "INSERT INTO login_time (f_emp_id, f_clock_in, f_created_date, f_modified_date) VALUES ('$emp_id', '$curtime', '$now', '$now')";

  $result = mysqli_query($conn, $sql);

  $_SESSION['userlogin'] = $com_email;
  $_SESSION['emp_id'] = $emp_id;
  $_SESSION['role'] = $emp_level;
  $_SESSION['company'] = $company_id;

  if ($emp_level == "Admin" || $emp_level == "Master") {
    // echo "ok1"; exit;
    header('Location:./admin/dashboard/dashboard-a.php');
  } else {
    // echo "ok2"; exit;
    header('Location:../user/dashboard/dashboard-u.php');
  }
} else {

  echo '
			<script>
				alert("Incorrect Username or Password");
				window.location = "";
			</script>
			';
}
