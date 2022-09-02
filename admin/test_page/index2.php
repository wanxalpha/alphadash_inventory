<?php
session_start();
// error_reporting(0);
include('../include/config.php');
if (strlen($_SESSION['userlogin']) == 0) {
    header('location:login.php');
}

date_default_timezone_set("Asia/Kuala_Lumpur");
$t = time();
$month = date("m", $t);
$month2 = date("M", $t);
$year = date("Y", $t);
$date = date("Y-m-d", $t);
$month_days = date("t", $t);
$date1 = date("Y-m-01", strtotime($date));
$date2 = date("Y-m-t", strtotime($date));
$last_month1 = date("Y-n-j", strtotime("first day of previous month"));
$last_month2 = date("Y-n-j", strtotime("last day of previous month"));

$last_month_name = date("N", strtotime("first day of previous month"));
if($last_month_name == 1){
    $month_name = "January";
}elseif($last_month_name == 2){
    $month_name = "February";
}elseif($last_month_name == 3){
    $month_name = "March";
}elseif($last_month_name == 4){
    $month_name = "April";
}elseif($last_month_name == 5){
    $month_name = "May";
}elseif($last_month_name == 6){
    $month_name = "June";
}elseif($last_month_name == 7){
    $month_name = "July";
}elseif($last_month_name == 8){
    $month_name = "August";
}elseif($last_month_name == 9){
    $month_name = "September";
}elseif($last_month_name == 10){
    $month_name = "October";
}elseif($last_month_name == 11){
    $month_name = "November";
}elseif($last_month_name == 12){
    $month_name = "December";
}

$pay_id = $_GET['pay_id'];
// echo $pay_id; exit;

$sql = "SELECT * FROM employees a LEFT JOIN bank_slip b ON a.f_emp_id = b.f_emp_id LEFT JOIN designations c ON a.f_designation = c.f_id WHERE a.f_delete='N' AND a.f_id='$pay_id'";
// echo $sql; exit;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$id = $row['f_id'];
$emp_full_name = $row['f_full_name'];
$emp_id = $row['f_emp_id'];
$emp_ic = $row['f_identity'];
$emp_epf = $row['f_epf'];
$emp_socso = $row['f_socso'];
$emp_tax = $row['f_tax'];
$emp_epf_amt = $row['f_epf_num'];
$emp_socso_amt = $row['f_socso_num'];
$emp_eis_amt = $row['f_eis_num'];
$emp_role = $row['f_position'];
$emp_basic = $row['f_salary'];
$emp_mobile_all = $row['f_mobile_all'];
$emp_park_all = $row['f_park_all'];
$emp_bank = $row['f_bank'];
$emp_acc = $row['f_bank_acc'];

$sql3 = "SELECT * FROM bank WHERE f_delete='N' AND f_id='$emp_bank'";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_array($result3);
$emp_bank_name = $row3['f_bank_name'];

$sql4 = "SELECT SUM(f_claim_amt) as claim_amt FROM claims WHERE f_status='Approved' AND f_emp_id='$emp_id' AND f_claim_month='$month_name'";
$result4 = mysqli_query($conn, $sql4);
$row4 = mysqli_fetch_array($result4);
$claim_amt = $row4['claim_amt'];
// echo $sql4; exit;

if ($emp_mobile_all == 0) {
    $emp_mobile_all = "0.00";
}

if ($emp_park_all == 0) {
    $emp_park_all = "0.00";
}

$sql2 = "SELECT f_emp_id, SUM(f_total) AS up_leave FROM leaves WHERE f_leave_type='2' AND f_status='Approved' AND f_emp_id='$emp_id' AND f_start_date >='$last_month1' AND f_end_date <='$last_month2'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($result2);
$up_leave = $row2['up_leave'];

$total_qty = $month_days - $up_leave;

$total_deduction = number_format($emp_epf_amt + $emp_socso_amt + $emp_eis_amt, 2);

if ($total_qty == 31) {
    $basic_sal = $emp_basic;
    $gross_ytd = number_format($basic_sal + $emp_park_all + $emp_mobile_all + $claim_amt, 2);
    $net_sal = number_format($emp_basic + $emp_mobile_all + $emp_park_all + $claim_amt - $emp_epf_amt - $emp_socso_amt - $emp_eis_amt, 2);

    $employer_epf = $basic_sal * 0.13;
    $employer_socso = $basic_sal * 0.05;
    $employer_eis = $basic_sal * 0.02;
} else {
    $basic_sal = round(($emp_basic / $month_days) * $total_qty, 2);
    $gross_ytd = number_format($basic_sal + $emp_park_all + $emp_mobile_all + $claim_amt, 2);
    $net_sal = number_format($basic_sal + $emp_mobile_all + $emp_park_all + $claim_amt - $emp_epf_amt - $emp_socso_amt - $emp_eis_amt, 2);

    $employer_epf = $basic_sal * 0.13;
    $employer_socso = $basic_sal * 0.05;
    $employer_eis = $basic_sal * 0.02;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Salary - HRMS admin template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body style="padding:10px;" onload="generatePDF();">
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Page Wrapper -->
        <!-- <div class="page-wrapper"> -->

        <!-- Page Content -->
        <div class="content container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 m-b-2">
                                    <img src="assets/img/logo.png" class="inv-logo" alt="">
                                </div>
                                <br><br>
                            </div>
                            <div class="row" style="border:3px solid #ccc;">
                                <div class="col-sm-6" style="margin-top:30px; padding-left: 30px; padding-right:30px;">
                                    <ul class="list-unstyled">
                                        <li style="padding-top:5px; padding-right:55px">
                                            <h5 class="mb-2">Company : <span style="float:right">Alphacore Technology Sdn.Bhd</span></h5>
                                        </li>
                                        <li style="padding-top:5px; padding-right:55px">
                                            <h5 class="mb-2">Emp Name / Code : <span style="float:right"><?php echo $emp_full_name; ?> / <?php echo $emp_id ?></span></h5>
                                        </li>
                                        <li style="padding-top:5px; padding-right:55px">
                                            <h5 class="mb-2">Bank : <span style="float:right"><?php echo $emp_bank_name; ?> / <?php echo $emp_acc ?></span></h5>
                                        </li>
                                        <li style="padding-top:5px; padding-right:55px">
                                            <h5 class="mb-2">Tax Number : <span style="float:right"><?php echo $emp_tax; ?></span></h5>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6" style="margin-top:30px; padding-left: 30px;">
                                    <ul class="list-unstyled">
                                        <li style="padding-top:5px; padding-right:55px">
                                            <h5 class="mb-2">SOCSO Number : <span style="float:right; padding-right:80px;"><?php echo $emp_socso; ?></span></h5>
                                        </li>
                                        <li style="padding-top:5px; padding-right:55px">
                                            <h5 class="mb-2">EPF Number : <span style="float:right; padding-right:80px;"><?php echo $emp_epf; ?></span></h5>
                                        </li>
                                        <li style="padding-top:5px; padding-right:55px">
                                            <h5 class="mb-2">Designation : <span style="float:right; padding-right:80px;"><?php echo $emp_role; ?></span></h5>
                                        </li>
                                        <li style="padding-top:5px; padding-right:55px">
                                            <h5 class="mb-2">Pay Period : <span style="float:right; padding-right:80px;"><?php echo $last_month1; ?> to <?php echo $last_month2 ?></span></h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row" style="border:3px solid #ccc;">
                                <div class="col-sm-2" style="padding:10px;">
                                    <span>EARNING</span>
                                </div>
                                <div class="col-sm-2" style="padding:10px;">
                                    <span>QTY</span>
                                </div>
                                <div class="col-sm-2" style="border-right:3px solid #ccc; padding:10px">
                                    <span>AMOUNT</span>
                                </div>
                                <div class="col-sm-2" style="padding:10px;">
                                    <span>DEDUCTION</span>
                                </div>
                                <div class="col-sm-2" style="padding:10px;">
                                    <span>QTY</span>
                                </div>
                                <div class="col-sm-2" style="padding:10px;">
                                    <span>AMOUNT</span>
                                </div>
                            </div>
                            <div class="row" style="border:3px solid #ccc; border-bottom:0px;">
                                <div class="col-sm-2" style="padding:10px;">
                                    <span>Basic Salary</span>
                                </div>
                                <div class="col-sm-2" style="padding:10px; text-align:center">
                                    <span><?php echo $total_qty ?></span>
                                </div>
                                <div class="col-sm-2" style="border-right:3px solid #ccc; padding:10px">
                                    <span>RM</span>
                                    <span style="float:right"><?php echo $basic_sal ?></span>
                                </div>
                                <div class="col-sm-2" style="padding:10px;">
                                    <span>Employee EPF</span>
                                </div>
                                <div class="col-sm-2" style="padding:10px; text-align:center">
                                    <span>1</span>
                                </div>
                                <div class="col-sm-2" style="padding:10px;">
                                    <span>RM</span>
                                    <span style="float:right"><?php echo $emp_epf_amt ?></span>
                                </div>
                            </div>
                            <div class="row" style="border-left:3px solid #ccc;border-right:3px solid #ccc;">
                                <div class="col-sm-2" style="padding:10px;">
                                    <?php
                                    if ($emp_park_all > 0) {
                                        echo '
                                        <span>Parking Allowance</span>
                                        ';
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-2" style="padding:10px; text-align:center">
                                    <?php
                                    if ($emp_park_all > 0) {
                                        echo '
                                        <span>1</span>
                                        ';
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-2" style="border-right:3px solid #ccc; padding:10px">
                                    <?php
                                    if ($emp_park_all > 0) {
                                        echo '
                                        <span>RM</span>
                                        <span style="float:right">' . $emp_park_all . '</span>
                                        ';
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-2" style="padding:10px;">
                                    <span>Employee Socso</span>
                                </div>
                                <div class="col-sm-2" style="padding:10px; text-align:center">
                                    <span>1</span>
                                </div>
                                <div class="col-sm-2" style="padding:10px;">
                                    <span>RM</span>
                                    <span style="float:right"><?php echo $emp_socso_amt ?></span>
                                </div>
                            </div>
                            <div class="row" style="border-left:3px solid #ccc;border-right:3px solid #ccc;">
                                <div class="col-sm-2" style="padding:10px;">
                                    <?php
                                    if ($emp_mobile_all > 0) {
                                        echo '
                                        <span>Mobile Allowance</span>
                                        ';
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-2" style="padding:10px; text-align:center">
                                    <?php
                                    if ($emp_mobile_all > 0) {
                                        echo '
                                        <span>1</span>
                                        ';
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-2" style="border-right:3px solid #ccc; padding:10px">
                                    <?php
                                    if ($emp_mobile_all > 0) {
                                        echo '
                                        <span>RM</span>
                                        <span style="float:right">' . $emp_mobile_all . '</span>
                                        ';
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-2" style="padding:10px;">
                                    <span>Employee EIS</span>
                                </div>
                                <div class="col-sm-2" style="padding:10px; text-align:center">
                                    <span>1</span>
                                </div>
                                <div class="col-sm-2" style="padding:10px;">
                                    <span>RM</span>
                                    <span style="float:right"><?php echo $emp_eis_amt ?></span>
                                </div>
                            </div>
                            <div class="row" style="border-left:3px solid #ccc;border-right:3px solid #ccc;">
                                <div class="col-sm-2" style="padding:10px;">
                                    <?php
                                    if ($claim_amt > 0) {
                                        echo '
                                        <span>Claims</span>
                                        ';
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-2" style="padding:10px; text-align:center">
                                </div>
                                <div class="col-sm-2" style="border-right:3px solid #ccc; padding:10px">
                                    <?php
                                    if ($claim_amt > 0) {
                                        echo '
                                        <span>RM</span>
                                        <span style="float:right">' . $claim_amt . '</span>
                                        ';
                                    }
                                    ?>
                                </div>
                                <div class="col-sm-6" style="padding:10px;">
                                    <!-- <span>Employee EIS</span> -->
                                </div>
                            </div>
                            <div class="row" style="border:3px solid #ccc;">
                                <div class="col-sm-2" style="padding:10px;">
                                    <span>Gross Earning</span>
                                </div>
                                <div class="col-sm-2" style="padding:10px; text-align:center">
                                    <!-- <span><?php echo $total_qty ?></span> -->
                                </div>
                                <div class="col-sm-2" style="border-right:3px solid #ccc; padding:10px">
                                    <span>RM</span>
                                    <span style="float:right"><?php echo $gross_ytd ?></span>
                                </div>
                                <div class="col-sm-2" style="padding:10px;">
                                    <span>Total Deduction</span>
                                </div>
                                <div class="col-sm-2" style="padding:10px; text-align:center">
                                    <!-- <span>1</span> -->
                                </div>
                                <div class="col-sm-2" style="padding:10px;">
                                    <span>RM</span>
                                    <span style="float:right"><?php echo $total_deduction ?></span>
                                </div>
                            </div>
                            <div class="row" style="border:3px solid #ccc;border-bottom:0px;">
                                <div class="col-sm-2" style="padding:10px;">
                                    <span>Gross YTD</span>
                                </div>
                                <div class="col-sm-2" style="padding:10px; text-align:center">
                                    <!-- <span><?php echo $total_qty ?></span> -->
                                </div>
                                <div class="col-sm-2" style=" padding:10px">
                                    <span>RM</span>
                                    <span style="float:right"><?php echo $gross_ytd ?></span>
                                </div>
                                <div class="col-sm-2" style="padding:10px;">
                                    <span>Net Wages</span>
                                </div>
                                <div class="col-sm-2" style="padding:10px; text-align:center">
                                    <!-- <span>1</span> -->
                                </div>
                                <div class="col-sm-2" style="padding:10px;">
                                    <span>RM</span>
                                    <span style="float:right"><?php echo $net_sal ?></span>
                                </div>
                            </div>
                            <div class="row" style="border:3px solid #ccc; border-bottom:0px">
                                <div class="col-sm-4" style="padding:10px;">
                                    <!-- <span>Gross YTD</span> -->
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc;padding:10px; text-align:center">
                                    <span>EMPLOYEE CURRENT</span>
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc; padding:10px; text-align:center">
                                    <span>EMPLOYEE YTD</span>
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc;padding:10px; text-align:center">
                                    <span>EMPLOYER CURRENT</span>
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc;padding:10px; text-align:center">
                                    <span>EMPLOYER YTD</span>
                                </div>
                            </div>
                            <div class="row" style="border-left:3px solid #ccc;border-right:3px solid #ccc;">
                                <div class="col-sm-4" style="padding:10px;">
                                    <span>EPF</span>
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc;padding:10px; text-align:center">
                                    <span><?php echo $emp_epf_amt ?></span>
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc; padding:10px; text-align:center">
                                    <span><?php echo $emp_epf_amt ?></span>
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc;padding:10px; text-align:center">
                                    <span><?php echo $employer_epf ?></span>
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc;padding:10px; text-align:center">
                                    <span><?php echo $employer_epf ?></span>
                                </div>
                            </div>
                            <div class="row" style="border-left:3px solid #ccc;border-right:3px solid #ccc;">
                                <div class="col-sm-4" style="padding:10px;">
                                    <span>SOCSO</span>
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc;padding:10px; text-align:center">
                                    <span><?php echo $emp_socso_amt ?></span>
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc; padding:10px; text-align:center">
                                    <span><?php echo $emp_socso_amt ?></span>
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc;padding:10px; text-align:center">
                                    <span><?php echo $employer_socso ?></span>
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc;padding:10px; text-align:center">
                                    <span><?php echo $employer_socso ?></span>
                                </div>
                            </div>
                            <div class="row" style="border-left:3px solid #ccc;border-right:3px solid #ccc;">
                                <div class="col-sm-4" style="padding:10px;">
                                    <span>INCOME TAX</span>
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc;padding:10px; text-align:center">
                                    <!-- <span></span> -->
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc; padding:10px; text-align:center">
                                    <!-- <span><?php echo $emp_epf_amt ?></span> -->
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc;padding:10px; text-align:center">
                                    <!-- <span><?php echo $employer_epf ?></span> -->
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc;padding:10px; text-align:center">
                                    <!-- <span><?php echo $employer_epf ?></span> -->
                                </div>
                            </div>
                            <div class="row" style="border:3px solid #ccc;border-top:0px">
                                <div class="col-sm-4" style="padding:10px;">
                                    <span>EMPLOYMENT INSURANCE SCHEME</span>
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc;padding:10px; text-align:center">
                                    <span><?php echo $emp_eis_amt ?></span>
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc; padding:10px; text-align:center">
                                    <span><?php echo $emp_eis_amt ?></span>
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc;padding:10px; text-align:center">
                                    <span><?php echo $employer_eis ?></span>
                                </div>
                                <div class="col-sm-2" style="border-left:3px solid #ccc;border-right:3px solid #ccc;padding:10px; text-align:center">
                                    <span><?php echo $employer_eis ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <span>This is computer generated payslip. No singature is required.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

    <!-- </div> -->
    <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.0/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rasterizehtml/1.3.0/rasterizeHTML.allinone.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>

    <script>
        function generatePDF() {

            var pdf = new jsPDF('p', 'pt', 'a4');

            pdf.internal.scaleFactor = 2.25;

            pdf.addHTML(document.body, 0, 0, {
                pagesplit: false
            }, function() {
                pdf.save('web.pdf');
            });

        }
    </script>
</body>

</html>