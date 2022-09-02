<?php

include_once '../../../include/config.php';

$employees = trim($_GET["employees"]);

mysqli_set_charset($conn, "utf8");

date_default_timezone_set("Asia/Kuala_Lumpur");
$t = time();
$now = date("Y-m-d H:i:s", $t);
$curdate = date("Y-m-d", $t);
$year = date("Y", $t);
$month = date("m", $t);
$hour = date("H", $t);
$minute = date("i", $t);

$leave_total = array();

if (strlen($employees) > 0) {

// Annual Leave Start
    $sql = "SELECT SUM(f_total) as total_claim FROM leaves WHERE f_emp_id='$employees' AND f_status !='Rejected' AND f_leave_type='1'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num > 0){
        while($row = mysqli_fetch_array($result)){
            $total_claim = $row['total_claim'];
        }
    }

    $last_year = $year-1;

    $date1 = $last_year .'-01-01';
    $date2 = $last_year .'-12-31';

    // last year
    $sql2 = "SELECT SUM(f_total) as total_claim FROM leaves WHERE f_emp_id='$employees' AND f_created_date BETWEEN '$date1' AND '$date2'";
    $result2 = mysqli_query($conn, $sql2);
    $num2 = mysqli_num_rows($result2);

    if($num2 > 0){
        while($row = mysqli_fetch_array($result2)){
            $total_claim2 = $row['total_claim'];
        }
    }

    $sql3 = "SELECT * FROM employees WHERE f_delete='N' AND f_emp_id='$employees'";
    $result3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_array($result3);
    $join_date = $row3['f_join_date'];

    $join_year = date('Y', strtotime($join_date));
    $join_month = date('m', strtotime($join_date));

    //bring forward leave
    if($join_year != $year){
        if($total_claim2 < 9){
            $date3 = '5';
        }else{
            $date3 = $total_claim2;
        }
    }else{
        if($join_month != '1'){
            $date3 = $total_claim2 - $join_month;
        }else{
            $date3 = $total_claim2;
        }    
    }
    
    if($month == '12'){
        $annual_total = ($month + $date3) - $total_claim + 2;
    }else{
        $annual_total = ($month + $date3) - $total_claim;
    }
// Annual Leave End
// Medical Leave Start
    $sql = "SELECT SUM(f_total) as total_claim FROM leaves WHERE f_emp_id='$employees' AND f_status !='Rejected' AND f_leave_type='4'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if($num > 0){
        while($row = mysqli_fetch_array($result)){
            $total_claim = $row['total_claim'];
        }
    }
    
    if($month == '12'){
        $medical_total = $month - $total_claim + 2;
    }else{
        $medical_total = $month - $total_claim;
    }
// Medical Leave End
//  Maternity Leave Start
    $date1 = $year .'-01-01';
    $date2 = $year .'-12-31';
    
    $sql4 = "SELECT SUM(f_total) as total_claim FROM leaves WHERE f_emp_id='$employees' AND f_status !='Rejected' AND f_leave_type='5' AND f_created_date BETWEEN '$date1' AND '$date2'";
    $result4 = mysqli_query($conn, $sql4);
    $num4 = mysqli_num_rows($result4);

    if($num4 > 0){
        while($row4 = mysqli_fetch_array($result4)){
            $total_claim = $row4['total_claim'];
        }
    }

    $sql5 = "SELECT f_leave_max FROM leave_type WHERE f_delete='N' AND f_id='5'";
    $result5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_array($result5);

    $total_leave = $row5['f_leave_max'];

    $maternity_total = $total_leave - $total_claim;
//  Maternity Leave End
//  Hospitalization Leave Start
    $date1 = $year .'-01-01';
    $date2 = $year .'-12-31';

    $sql4 = "SELECT SUM(f_total) as total_claim FROM leaves WHERE f_emp_id='$employees' AND f_status !='Rejected' AND f_leave_type='7' AND f_created_date BETWEEN '$date1' AND '$date2'";
    $result4 = mysqli_query($conn, $sql4);
    $num4 = mysqli_num_rows($result4);

    if($num4 > 0){
        while($row4 = mysqli_fetch_array($result4)){
            $total_claim = $row4['total_claim'];
        }
    }

    $sql5 = "SELECT f_leave_max FROM leave_type WHERE f_delete='N' AND f_id='5'";
    $result5 = mysqli_query($conn, $sql5);
    $row5 = mysqli_fetch_array($result5);

    $total_leave = $row5['f_leave_max'];

    $hospital_total = $total_leave - $total_claim;
//  Hospitalization Leave End

    $leave_total[] = array("annual" => $annual_total, "medical" => $medical_total, "maternity" => $maternity_total, "hospital" => $hospital_total);
}

echo json_encode($leave_total);

$dbh = null;
?>